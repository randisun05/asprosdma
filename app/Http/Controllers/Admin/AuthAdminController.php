<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::
        when(request()->q, function($query) {
            $query->where('title', 'like', '%' . request()->q . '%');
        })
        ->latest()
        ->paginate(10);

        $users->appends(['q' => request()->q]);


        return inertia('Admin/Setting/Index', [
            'users' => $users,
         ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('Admin/Setting/Create', [

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
        'nip' => 'required|string',
        'name' => 'required|',
        'email' => 'required',
        'role' => 'required',
        'password' => 'required',
        'position' => 'required',
    ]);

        $password = Hash::make($request->nip);
        User::create([
            'nip' => $request->nip,
            'name' => $request->name,
            'email' => $request->email,
            'role' =>  $request->role,
            'password' => $password,
            'position' => $request->position,
            'ref' => in_array($request->position, ['kabid', 'bendahara', 'sekretaris']) ? 1 : ($request->position === 'anggota' ? 2 : 3),
        ]);


     //redirect
     return redirect()->route('admin.setting.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return inertia('Admin/Setting/Edit', [
            'user' => $user,
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

        // Validate request including file validation
      $request->validate([
        'nip' => 'required|string',
        'name' => 'required|',
        'email' => 'required',
        'role' => 'required',
        'password' => 'required',
        'position' => 'required',
    ]);

    $password = Hash::make($request->password);

        User::where('id', $id)->update([
            'nip' => $request->nip,
            'name' => $request->name,
            'email' => $request->email,
            'role' =>  $request->role,
            'password' => $password,
            'position' => $request->position,
            'ref' => in_array($request->position, ['kabid', 'bendahara', 'sekretaris']) ? 1 : ($request->position === 'anggota' ? 2 : 3),

        ]);


     //redirect
     return redirect()->route('admin.setting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = User::findOrFail($id);
        $event->delete();
        //redirect
        return redirect()->route('admin.setting.index');
    }
}
