<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberCardController extends Controller
{
    public function index()
    {
        if (auth()->guard('member')->check()) {
            $profile = Member::get();
            };

            return inertia('User/MemberCard/Index', [
             'profile' => $profile
            ]);

    }
}
