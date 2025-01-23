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


        $details = DetailEvent::where('event_id',$id)
        ->with('member','event')
        ->when(request()->q, function($query) {
            $query->where('title', 'like', '%' . request()->q . '%');
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



    public function certificatesTemplateStore(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'image' => 'required',
        ]);

        $image = $request->file('image')->storePublicly('/images');

        TemplateCertificate::create([
            'title' => $request->title,
            'image' => $image,
            'status' => '1',
        ]);

        return json_encode(['success' => 'Data has been saved']);

        return inertia('Admin/Events/Templates', [
            'templates' => $templates,
         ]);
    }

    public function certificatesTemplate()
    {
        $templates = TemplateCertificate::latest()
        ->paginate(10);

        return inertia('Admin/Events/Templates', [
            'templates' => $templates,
         ]);
    }
    
    public function certificatesTemplateDelete($id)
    {
        $template = TemplateCertificate::findOrFail($id);

        $template->delete();

        return json_encode(['success' => 'Data has been deleted']);

        return inertia('Admin/Events/Templates', [
            'templates' => $templates,
         ]);
    }
    
    public function certificatesImport($id)
    {

        $event = Event::findOrFail($id);
        return inertia('Admin/Events/CertificatesImport', [
            'event' => $event,
         ]);
    }

    public function certificatesStore($id, Request $request)
    {

        $event = Event::findOrFail($id);
       

            $request->validate([
                'no_certificate' => 'required',
                'nip' => 'required',
                'name' => 'required',
                'body' => 'required',
                'date' => 'required',
                'template' => 'required',
        ]);

        Certificate::create([
            'event_id' => $event->id,
            'no_sertificate' => $request->no_certificate,
            'nip' => $request->nip,
            'name' => $request->name,
            'body' => $request->body,
            'date' => $request->date,
            'tamplate' => $request->template,
            'status' => '1',
            'qr_code' => '1',
            'link' => '1',
            'doc' => '1',
        ]);

        return json_encode(['success' => 'Data has been saved']);

        return inertia('Admin/Events/Certificates', [
            'event' => $event,
         ]);
    }




}
