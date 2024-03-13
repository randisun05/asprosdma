<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        //validate the form data
        $this->validate($request, [
            'nip'      => 'required',
            'password'  => 'required',
        ]);

        //cek nisn dan password
        $member = Member::where([
            'nip'      => $request->nip,
            'password'  => $request->password
        ])->first();

        if(!$member) {
            return redirect()->back()->with('error', 'NIP atau Password salah');
        }
        
        //login the user
        auth()->guard('member')->login($member);

        //redirect to dashboard
        return redirect()->route('user.dashboard');
    }
}
