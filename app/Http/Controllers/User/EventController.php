<?php

namespace App\Http\Controllers\User;

use App\Models\Event;
use App\Models\Member;
use App\Models\DetailEvent;
use App\Mail\SendEmailEvent;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $events = Event::whereNot('title','Media')
        ->when(request()->q, function($query) {
            $query->where('title', 'like', '%' . request()->q . '%');
        })
        ->latest()
        ->paginate(3);

         //append query string to pagination links
         $events->appends(['q' => request()->q]);

         return inertia('User/Events/Index', [
             'events' => $events,
          ]);

    }

    public function join($id, Request $request)
    {

        $detailEvent = DetailEvent::firstOrCreate(
            [
                'event_id' => $id,
                'member_id' => auth()->guard('member')->user()->id,
            ],
            [
                'title' => "peserta",
                'status' => "approved",
            ]
        );

        if ($detailEvent->wasRecentlyCreated) {
            // Baru saja dibuat, berarti belum terdaftar sebelumnya
            // Tampilkan pesan bahwa mereka berhasil terdaftar
            $event = Event::where('id',$detailEvent->event_id)->first();
            $email = Member::where('id', $detailEvent->member_id)->first();

            Mail::to($email['email'])->send(new SendEmailEvent($event));

            return redirect()->route('user.events.index');
        } else {
            // Sudah ada, berarti sudah terdaftar sebelumnya
            // Tampilkan pesan bahwa mereka sudah terdaftar sebelumnya
            return redirect()->route('user.events.index');
        }



      //redirect
     return redirect()->route('user.events.index');

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

        return inertia('User/Events/Show', [
            'event' => $event,

         ]);
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
}
