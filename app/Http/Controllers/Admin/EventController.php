<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Models\Member;
use App\Models\Certificate;
use App\Models\DetailEvent;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use App\Models\ProfileDataMain;
use App\Models\ProfileDataPosition;
use App\Models\TemplateCertificate;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EventParticipantsExport;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::
             when(request()->q, function($query) {
                 $query->where('title', 'like', '%' . request()->q . '%');
             })
             ->latest()
             ->paginate(10);

        $events->appends(['q' => request()->q]);

        return inertia('Admin/Events/Index', [
            'events' => $events,
         ]);

     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return inertia('Admin/Events/Create', [

         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validate request including file validation
    $request->validate([
        'title' => 'required|string',
        'body' => 'required|',
        'date' => 'required',
        'participant' => 'required',
        'enddate' => 'required',
        'date' => 'required',
        'place' => 'required',
        'image' => '|image|mimes:jpeg,png,jpg,gif,svg|max:5048|nullable',
        'file' => 'required',
    ]);

    $slug = strtolower(str_replace(' ', '-', $request->title));

    $image = $request->file('image');
    if ($image) {
        $image = $request->file('image')->storePublicly('/images');
        // Proceed with storing or processing the uploaded file
    };
        Event::create([
            'title' => $request->title,
            'date' => $request->date,
            'participant' => $request->participant,
            'body' =>  $request->body,
            'slug' => $slug,
            'enddate' => $request->enddate,
            'image' => $image,
            'place' => $request->place,
            'link' => $request->link,
            'file' => $request->file
        ]);

     //redirect
     return redirect()->route('admin.events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);

        $details = DetailEvent::where('event_id', $id)
        ->with('member', 'event')
        ->when(request()->q, function($query) {
            $query->whereHas('member', function($subQuery) {
            $subQuery->where('name', 'like', '%' . request()->q . '%');
            });
        })
        ->latest()
        ->paginate(10);

        $details->appends(['q' => request()->q]);

        return inertia('Admin/Events/Show', [
            'event' => $event,
            'details' => $details
        ]);
        //redirect
        return redirect()->route('admin.events.index');
    }

    public function absenAll($id)
    {
        $details = DetailEvent::where('event_id', $id)->get();

        foreach ($details as $detail) {
            $detail->update([
                'status' => 'hadir',
            ]);
        }

        return redirect()->route('admin.events.show', $id)->with('success', 'Data has been saved');
    }

    public function updateRole($id, Request $request)
    {

        $request->validate([
            'title' => 'required',
        ]);

        $detail = DetailEvent::where('id', $id)->first();

        $detail->update([
            'title' => $request->title,
        ]);

        return redirect()->route('admin.events.show', $detail->event_id)->with('success', 'Data has been saved');
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $event = Event::findOrFail($id);
        return inertia('Admin/Events/Edit', [
            'event' => $event,
        ]);

        //redirect
        return redirect()->route('admin.events.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate request including file validation
      $request->validate([
        'title' => 'required|string',
        'body' => 'required|',
        'date' => 'required',
        'participant' => 'required',
        'enddate' => 'required',
        'date' => 'required',
        'place' => 'required',
        'file' => 'required',
    ]);

    $slug = strtolower(str_replace(' ', '-', $request->title));

    $image = $request->file('image');
    if ($image) {
        $image = $request->file('image')->storePublicly('/images');
        // Proceed with storing or processing the uploaded file
    } else {
        $image = Event::where('id', $id)->value('image');
    };

        Event::where('id',$id)->update([
            'title' => $request->title,
            'date' => $request->date,
            'participant' => $request->participant,
            'body' =>  $request->body,
            'slug' => $slug,
            'enddate' => $request->enddate,
            'image' => $image,
            'place' => $request->place,
            'link' => $request->link,
            'file' => $request->file
        ]);


     //redirect
     return redirect()->route('admin.events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        $event->delete();

        //redirect
        return redirect()->route('admin.events.index');
    }

    public function change($id)
    {

        $status = Event::where('id', $id)->value('status');

        if ($status == 'active') {
            Event::where('id',$id)->update([
                'status' => "closed",
            ]);
        } else {
            Event::where('id',$id)->update([
                'status' => "active",
            ]);
        }

     //redirect
     return redirect()->route('admin.events.index');
    }

    public function absen($id)
    {

        $status = Event::where('id', $id)->value('absen');

        if ($status == 'N') {
            Event::where('id',$id)->update([
                'absen' => "Y",
            ]);
        } else {
            Event::where('id',$id)->update([
                'absen' => "N",
            ]);
        }

     //redirect
     return redirect()->route('admin.events.index');
    }


    public function exportParticipant($id)
    {
        $event = Event::findOrFail($id);

        $details = DetailEvent::where('event_id',$id)
        ->with('member','event')
        ->when(request()->q, function($query) {
            $query->where('title', 'like', '%' . request()->q . '%');
        })
        ->latest()
        ->get();

        return Excel::download(new EventParticipantsExport($details), 'participants.xlsx');

    }

    public function certificatesIndex($id)
    {
        $event = Event::findOrFail($id);
        $members = Member::all();
        $datas = Certificate::where('event_id',$id)
             ->when(request()->q, function($query) {
                 $query->where('title', 'like', '%' . request()->q . '%');
             })
             ->latest()
             ->paginate(10);

        $datas->appends(['q' => request()->q]);
        return inertia('Admin/Events/CertificatesIndex', [
            'event' => $event,
            'members' => $members,
            'datas' => $datas,
         ]);
    }

    public function certificatesCreate($id)
    {
        $event = Event::findOrFail($id);
        $members = Member::all();
        $templates = TemplateCertificate::all();
        return inertia('Admin/Events/Certificates', [
            'event' => $event,
            'members' => $members,
            'templates' => $templates,
         ]);
    }

    public function certificatesView($event, $id)
    {

        $data = Certificate::with('event')->findOrFail($id);
        $template = TemplateCertificate::where('id',$data->template)->first();
        $nomor = substr($data->no_certificate, 0, 4);
        $storagePath = storage_path('app/public/sertifikat');

         // Generate QR Code
        $qrLink = $data->qr_code;
        QrCode::format('png')->size(300)->generate($qrLink);
        // Generate QR Code (variable $qr removed as it was unused)
        QrCode::generate($qrLink);

         // Build the command
         $command = "python3 " . escapeshellarg(base_path('resources/py/certificate.py')) .
        // " " . escapeshellarg('template=' . 'storage/documents/' . $data->template) .
        " " . escapeshellarg(public_path('storage/' . $template->image)) .
         " " . escapeshellarg('nomor=' . $data->no_certificate) .
         " " . escapeshellarg('nama=' . $data->name) .
         " " . escapeshellarg('qr=' . $qrLink) .
         " " . escapeshellarg('file=' . 'sertifikat-' . $nomor . '-' . $data->name . '.pdf').
         " " . escapeshellarg('path=' . $storagePath);

         $output = shell_exec($command);


         if ($output === null) {
             return response()->json(['error' => 'Command execution failed.'], 500);
         }

        $data->update([
            'doc' => 'sertifikat/' . 'sertifikat-' . $nomor . '-' . $data->name . '.pdf'
        ]);

        return response()->download(public_path('storage/' . $data->doc), 'sertifikat-' . $nomor . '-' . $data->name . '.pdf')->deleteFileAfterSend(true);

        //  return response()->json(['success' => 'Certificate generated successfully.']);

         // Return success response
        //  return redirect()->route('admin.events.certificates.index', $event)->with('success', 'Sertifikat berhasil dihasilkan');

    }


    public function certificatesTemplateStore(Request $request)
    {

        $request->validate([
            'title' => 'required|unique:template_certificates,title',
            'image' => 'required',
        ]);

        $image = $request->file('image')->storePublicly('/template');

        TemplateCertificate::create([
            'title' => $request->title,
            'image' => $image,
            'status' => '1',
        ]);

        return redirect()->back();

    }

    public function certificatesTemplate(Request $request)
    {

        $templates = TemplateCertificate::latest()->paginate(10);

        return inertia('Admin/Events/Templates', [
            'templates' => $templates,
            'event_id' => $request->event_id,
        ]);
    }

    public function certificatesTemplateDelete($id)
    {
        $template = TemplateCertificate::findOrFail($id);

        $template->delete();

        return redirect()->back()->with('success', 'Data has been deleted');
    }

    public function certificatesImport($id)
    {

        $event = Event::findOrFail($id);
        return inertia('Admin/Events/CertificatesImport', [
            'event' => $event,
         ]);
    }

    public function certificatesImportCreate($id)
    {
        $event = Event::findOrFail($id);
        $templates = TemplateCertificate::all();
        $existingCertificateNips = Certificate::where('event_id', $id)
        ->pluck('nip')
        ->toArray();

        $users = DetailEvent::with('member')->where('event_id', $id)
        ->where('status','hadir')
        ->whereHas('member', function($query) use ($existingCertificateNips) {
            $query->whereNotIn('nip', $existingCertificateNips);
        })->when(request()->q, function($query) {
            $query->whereHas('member', function($subQuery) {
            $subQuery->where('name', 'like', '%' . request()->q . '%')
                 ->orWhere('nip', 'like', '%' . request()->q . '%');
            });
        })
        ->latest()
        ->paginate(20);

        $users->appends(['q' => request()->q]);

        return inertia('Admin/Events/CertificatesImport', [
            'event' => $event,
            'templates' => $templates,
            'users' => $users,
         ]);
    }

    public function certificatesImportStore($id, Request $request)
    {

            $request->validate([
                'category' => 'required',
                'date' => 'required',
                'template' => 'required',
        ]);

        $event = Event::findOrFail($id);
        $ids = is_array($request->user_id)
        ? array_map('trim', $request->user_id)  // Jika sudah array, bersihkan spasi
        : array_map('trim', explode(',', $request->user_id)); // Jika string, ubah ke array

        $members = DetailEvent::with('member')
            ->where('event_id', $id)
            ->whereIn('member_id', $ids)
            ->get();

        if ($members->isEmpty()) {
            return response()->json(['message' => 'Tidak ada anggota yang ditemukan.'], 404);
        }

        $lastCertificate = Certificate::where('category', $request->category)
        ->whereYear('date', date('Y', strtotime($request->date)))
        ->whereMonth('date', date('m', strtotime($request->date)))
        ->orderBy('created_at', 'desc')
        ->first();

        $lastNumber = $lastCertificate ? intval(explode('/', $lastCertificate->no_certificate)[0]) : 0;

        foreach ($members as $member) {
            $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
            $kodeKegiatan = $request->category; // Replace with actual activity code
            $bulan = date('m', strtotime($request->date));
            $tahun = date('Y', strtotime($request->date));
            $nomor = "{$newNumber}/{$kodeKegiatan}/PP Aspro SDMA/{$bulan}/{$tahun}";
            $lastNumber++;
            $link = (string) \Illuminate\Support\Str::uuid();
            $qrcode = "https://asprosdma.id/certificates/$link";

            Certificate::create([
            'event_id' => $event->id,
            'no_certificate' =>  $nomor,
            'category' => $request->category ?? 'kombel',
            'nip' => $member->member->nip,
            'name' =>  $member->member->name,
            'body' => 'template',
            'date' => $request->date,
            'template' => $request->template,
            'status' => '1',
            'qr_code' => $qrcode,
            'link' => $link,
            'doc' => $member->member->agency,
            ]);
        }

        return redirect()->route('admin.events.certificates.index', $id)->with('success', 'Data has been saved');
    }

    public function certificatesStore($id, Request $request)
    {

        $event = Event::findOrFail($id);
        $lastCertificate = Certificate::whereYear('date', date('Y', strtotime($request->date)))
        ->whereMonth('date', date('m', strtotime($request->date)))
        ->orderBy('created_at', 'desc')
        ->first();

        $lastNumber = $lastCertificate ? intval(explode('/', $lastCertificate->no_certificate)[0]) : 0;
        $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        $kodeKegiatan = $request->category; // Replace with actual activity code
        $bulan = date('m', strtotime($request->date));
        $tahun = date('Y', strtotime($request->date));
        $nomor = "{$newNumber}/{$kodeKegiatan}/PP Aspro SDMA/{$bulan}/{$tahun}";

        $link = (string) \Illuminate\Support\Str::uuid();

        $qrcode = "https://asprosdma.id/certificates/$link";

            $request->validate([
                'category' => 'required',
                'nip' => 'required|unique:certificates,nip,NULL,id,event_id,' . $id,
                'name' => 'required',
                'date' => 'required',
                'template' => 'required',
        ]);

        Certificate::create([
            'event_id' => $event->id,
            'no_certificate' => $nomor,
            'category' => $request->category,
            'nip' => $request->nip,
            'name' => $request->name,
            'body' => 'template',
            'date' => $request->date,
            'template' => $request->template,
            'status' => '1',
            'qr_code' => $qrcode,
            'link' => $link,
            'doc' => $request->agency,
        ]);

        return redirect()->route('admin.events.certificates.index', $id)->with('success', 'Data has been saved');
    }

    public function certificatesDestroy($id, $certificate)
    {
        $certificate = Certificate::findOrFail($certificate);
        $certificate->delete();
        return redirect()->back()->with('success', 'Data has been deleted');
    }


}
