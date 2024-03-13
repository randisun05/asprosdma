<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ProfileDataMain;
use App\Models\ProfileDataPosition;
use Illuminate\Http\Request;

class DataProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $main = ProfileDataMain::where('nip',auth()->guard('member')->user()->nip)
        ->first();

        $data = ProfileDataPosition::with('main')
        ->where('main_id',$main->id)
        ->first();
  
        return inertia('User/DataProfile/Index', [
           'data' => $data,
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $main = ProfileDataMain::where('nip',auth()->guard('member')->user()->nip)
        ->first();

        $data = ProfileDataPosition::with('main')
        ->where('main_id',$main->id)
        ->first();
  
        return inertia('User/DataProfile/Edit', [
           'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        

          $request->validate([
                'nip' => 'required',
                'name' => 'required',
                'fname' => 'required',
                'lname' => 'required',
                'leveledu' => 'required',
                'lastedu' => 'required',
                'place' => 'required',
                'dob' => 'required',
                'docid' => 'required',
                'nodocid' => 'required',
                'email' => 'required',
                'contact' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'villages' => 'required',
                'district' => 'required',
                'regency' => 'required',
                'province' => 'required',
                'type' => 'required',
                'status' => 'required',
                'agency' => 'required',
                'unit' => 'required',
                'subunit' => 'required',
                'position' => 'required',
                'location' => 'required',
                'tmtpos' => 'required',
                'golru' => 'required',
                'tmtgolru' => 'required',
                'wyear' => 'required',
                'wmonth' => 'required',
        ]);

        $main = ProfileDataMain::where('nip',auth()->guard('member')->user()->nip)
        ->first(); 

        //update data main
        $main->update([
                'nip' => $request->nip,
                'name' => $request->name,
                'fname' => $request->fname,
                'lname' => $request->lname,
                'leveledu' => $request->leveledu,
                'lastedu' => $request->lastedu,
                'place' => $request->place,
                'dob' => $request->dob,
                'docid' => $request->docid,
                'nodocid' => $request->nodocid,
                'email' => $request->email,
                'contact' => $request->contact,
                'gender' => $request->gender,
                'address' => $request->address,
                'villages' => $request->villages,
                'district' => $request->district,
                'regency' => $request->regency,
                'province' => $request->province,
                'type' => $request->type,
                'status' => $request->status,
        ]);

        $position = ProfileDataPosition::where('main_id',$main->id)
        ->first();

        $position->update([

                'agency' => $request->agency,
                'unit' => $request->unit,
                'subunit' => $request->subunit,
                'position' => $request->position,
                'location' => $request->location,
                'tmtpos' => $request->tmtpos,
                'golru' => $request->golru,
                'tmtgolru' => $request->tmtgolru,
                'wyear' => $request->wyear,
                'wmonth' => $request->wmonth,
             ]);
             
             return redirect()->route('user.profile');
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
