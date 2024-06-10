<?php

namespace App\Http\Controllers\Admin;

use App\Models\instansi;
use Illuminate\Http\Request;
use App\Models\ProfileDataMain;
use App\Models\ProfileDataPosition;
use App\Http\Controllers\Controller;

class DataMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datas = ProfileDataPosition::with('main')
    ->when(request()->q, function($query) {
        $query->whereHas('main', function($query) {
            $query->where('name', 'like', '%' . request()->q . '%')
                  ->orWhere('agency', 'like', '%' . request()->q . '%')
                  ->orWhere('nip', 'like', '%' . request()->q . '%');
        });
    })
    ->latest()
    ->paginate(10);



        $datas->appends(['q' => request()->q]);


        return inertia('Admin/Members/Index', [
            'datas' => $datas,
         ]);

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
        $data = ProfileDataPosition::where('id',$id)->with('main')->first();
        return inertia('Admin/Members/Show', [
           'data' => $data
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
        $data = ProfileDataPosition::where('id',$id)->with('main')->first();
        $instansis = instansi::get();
        return inertia('Admin/Members/Edit', [
           'data' => $data,
           'instansis' => $instansis,
        ]);
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


        $request->validate([
            'nip' => ['required','string', 'regex:/^\d{18}$/'],

    ],[
        'nip.regex' => 'NIP harus terdiri dari 18 angka.',


    ]);

    $id = ProfileDataPosition::where('id', $id)
    ->first();

    $main = ProfileDataMain::where('id', $id->main_id)
    ->first();


    //update data main
    $main->update([
            'nip' => $request->nip,
            // 'name' => $request->name,
            // 'fname' => $request->fname,
            // 'lname' => $request->lname,
            // 'leveledu' => $request->leveledu,
            // 'lastedu' => $request->lastedu,
            // 'place' => $request->place,
            // 'dob' => $request->dob,
            // 'docid' => $request->docid,
            // 'nodocid' => $request->nodocid,
            // 'email' => $request->email,
            // 'contact' => $request->contact,
            // 'gender' => $request->gender,
            // 'religion' => $request->religion,
    ]);

    // $position = ProfileDataPosition::where('main_id',$main->id)
    // ->first();

    // $position->update([
    //     'agency' => $request->agency,
    //     'type' => $request->type,
    //     'status' => $request->status,
    //     'unit' => $request->unit,
    //     'subunit' => $request->subunit,
    //     'position' => $request->position,
    //     'level' => $request->level,
    //     'location' => $request->location,
    //     'tmtpos' => $request->tmtpos,
    //     'golru' => $request->golru,
    //     'tmtgolru' => $request->tmtgolru,
    //     'wyear' => $request->wyear,
    //     'wmonth' => $request->wmonth,
    //  ]);

         return redirect()->route('admin.members.index')->with('success','data berhasil diupdate');
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
