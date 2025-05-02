<?php

namespace App\Http\Controllers\User;

use App\Models\Event;
use App\Models\Member;
use Barryvdh\DomPDF\PDF;
use App\Models\Certificate;
use App\Models\DetailEvent;
use App\Mail\SendEmailEvent;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
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
        if (auth()->guard('member')->check()) {
            $events = Event::whereNot('title', 'Media')
                ->when(request()->q, function ($query) {
                    $query->where('title', 'like', '%' . request()->q . '%');
                })
                ->latest()
                ->paginate(3);

            //append query string to pagination links
            $events->appends(['q' => request()->q]);

            return inertia('User/Events/Index', [
                'events' => $events
            ]);
        } else {
            return redirect()->route('login');
        }
    }

    public function join($id, Request $request)
    {

        if (auth()->guard('member')->check()) {
            $event = Event::findOrFail($id);

            if ($event->file == "Y") {
                $request->validate([
                    'document' => 'required',
                ]);
                 // Store the file using Laravel's file storage system
                $document = $request->file('document')->storePublicly('/documents');
            }


            $detailEvent = DetailEvent::firstOrCreate(
                [
                    'event_id' => $id,
                    'member_id' => auth()->guard('member')->user()->id,
                ],
                [
                    'title' => "peserta",
                    'status' => "approved",
                    'desc' => $document ?? null,
                ]
            );

            if ($detailEvent->wasRecentlyCreated) {
                // Baru saja dibuat, berarti belum terdaftar sebelumnya
                // Tampilkan pesan bahwa mereka berhasil terdaftar
                // $event = Event::where('id', $detailEvent->event_id)->first();
                // $email = Member::where('id', $detailEvent->member_id)->first();

                // Mail::to($email['email'])->send(new SendEmailEvent($event));

                return redirect()->route('user.events.index');
            } else {
                // Sudah ada, berarti sudah terdaftar sebelumnya
                // Tampilkan pesan bahwa mereka sudah terdaftar sebelumnya
                return redirect()->route('user.events.index');
            }
        } else {
            //redirect
            return redirect()->route('user.events.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        if (auth()->guard('member')->check()) {
            $memberId = auth()->guard('member')->user()->id;
            $status = $memberId ? 1 : 0;

            if ($memberId) {
                $detailEvent = DetailEvent::where('event_id', $event->id)->where('member_id', $memberId)->first();
                $status = $detailEvent ? 1 : 0;
                $hadir = $detailEvent->status == 'hadir' ? 1 : 0;

            }

            return inertia('User/Events/Show', [
                'event' => $event,
                'status' => $status,
                'detailEvent' => $detailEvent,
                'hadir' => $hadir ?? 0,
            ]);
        } else {
            return redirect()->route('login');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    public function absen($id)
    {
        if (auth()->guard('member')->check()) {

            $detailEvent = DetailEvent::where('event_id', $id)->where('member_id', auth()->guard('member')->user()->id)->first();
            $detailEvent->update([
                'status' => 'hadir',
            ]);

            return redirect()->route('user.events.index');
        } else {
            return redirect()->route('login');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function certificatesIndex()
    {
        if (auth()->guard('member')->check()) {
            $datas = Certificate::where('nip', auth()->guard('member')->user()->nip)
                ->when(request()->q, function ($query) {
                    $query->where('title', 'like', '%' . request()->q . '%');
                })
                ->latest()
                ->paginate(10);

            //append query string to pagination links
            $datas->appends(['q' => request()->q]);

            return inertia('User/Certificates/Index', [
                'datas' => $datas
            ]);
        } else {
            return redirect()->route('login');
        }
    }

    public function certificateView($id)
    {
        if (auth()->guard('member')->check()) {

            $data = Certificate::with('event')->findOrFail($id);
            // Generate QR Code
            $qrLink = $data->qr_code;
            QrCode::format('png')->size(300)->generate($qrLink);
            $qr = QrCode::generate($qrLink);
            return view('reports.certificates.certificate', compact('data','qr'));

        } else {
            return redirect()->route('login');
        }
    }

    public function info(Event $event)
    {
        if (auth()->guard('member')->check()) {

            return inertia('User/Events/Info', [
                'event' => $event,

            ]);
        } else {
            return redirect()->route('login');
        }
    }
}
