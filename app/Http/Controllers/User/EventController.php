<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DetailEvent;
use App\Models\Event;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::when(request()->q, function($query) {
            $query->where('title', 'like', '%' . request()->q . '%');
        })
        ->latest()
        ->paginate(10);

         //append query string to pagination links
         $events->appends(['q' => request()->q]);
       
         return inertia('User/Events/Index', [
             'events' => $events,
          ]);


    }

    public function join($id, Request $request)
    {
      DetailEvent::create([
        'event_id' => $id,
        'member_id' => auth()->guard('member')->user()->id,
        'title' => $request->role,
        'status' => "approved",
      ]);

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
    public function show($id)
    {
        //
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
