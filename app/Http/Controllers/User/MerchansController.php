<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Merchan;
use Illuminate\Http\Request;

class MerchansController extends Controller
{

    public function index()
    {
        if (auth()->guard('member')->check()) {
            $merchans = Merchan::when(request()->q, function($query) {
                $query->where('title', 'like', '%' . request()->q . '%');
            })
            ->latest()
            ->paginate(3);

             //append query string to pagination links
             $merchans->appends(['q' => request()->q]);

            return inertia('User/Merchans/Index', [
             'merchans' => $merchans
            ]);
        } else {
            return redirect()->route('login');
        }

    }
    public function show($id)
    {
        if (auth()->guard('member')->check()) {
            $merchan = Merchan::findOrFail($id);
            return inertia('User/Merchans/Show', [
            'merchan' => $merchan
        ]);
        } else {
            return redirect()->route('login');
        }

    }

}
