<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\ProfileDataMain;
use App\Models\ProfileDataPosition;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Merchan;
use App\Models\Post;

class DashboardController extends Controller
{
    public function __invoke()
    {

        $main = ProfileDataMain::where('nip',auth()->guard('member')->user()->nip)
        ->first();

        $profile = ProfileDataPosition::with('main')
        ->where('main_id',$main->id)
        ->first();

        $events = Event::whereNot('title','media')->when(request()->q, function($query) {
            $query->where('title', 'like', '%' . request()->q . '%');
        })
        ->latest()
        ->paginate(5);

        $merchans = Merchan::when(request()->q, function($query) {
            $query->where('title', 'like', '%' . request()->q . '%');
        })
        ->latest()
        ->paginate(5);

        $posts = Post::when(request()->q, function($query) {
            $query->where('title', 'like', '%' . request()->q . '%');
        })
        ->where(function($query) {
            $query->where('status', 'approved')
                ->orWhere('status', 'limited');
        })
        ->latest()
        ->paginate(5);

        $events->appends(['q' => request()->q]);
        $merchans->appends(['q' => request()->q]);
        $posts->appends(['q' => request()->q]);

        return inertia('User/Dashboard/Index', [
            'profile' => $profile,
            'events' => $events,
            'merchans' => $merchans,
            'posts' => $posts,
        ]);
    }
}
