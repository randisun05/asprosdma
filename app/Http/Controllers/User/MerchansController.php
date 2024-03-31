<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Merchan;
use Illuminate\Http\Request;

class MerchansController extends Controller
{

    public function index()
    {

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
    }
    public function show($id)
    {

        $merchan = Merchan::findOrFail($id);
        return inertia('User/Merchans/Show', [
         'merchan' => $merchan
        ]);
    }

}
