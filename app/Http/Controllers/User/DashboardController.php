<?php

namespace App\Http\Controllers\User;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Post;
use App\Models\Event;
use App\Models\Member;
use App\Models\Merchan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\ProfileDataMain;
use App\Models\ProfileDataPosition;
use App\Http\Controllers\Controller;
use Barryvdh\Snappy\Facades\SnappyImage;

class DashboardController extends Controller
{
    public function __invoke()
    {

        $main = ProfileDataMain::where('nip',auth()->guard('member')->user()->nip)
        ->first();

        $profile = ProfileDataPosition::with('main')->where('main_id',$main->id)->first();

        $user = Member::where('nip',$main->nip)
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

        $posts = Post::with('member')->when(request()->q, function($query) {
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
            'user' => $user
        ]);
    }

    public function print(Request $request)
    {
        $profile = $request->input('profile');

        // Render view ke HTML
        $html = view('member_card', compact('profile'))->render();

        // Konversi HTML menjadi gambar PNG
        $image = SnappyImage::loadHTML($html)->setOption('format', 'png')->inline();

        // Kembalikan respons dengan gambar PNG yang langsung diunduh
        return response($image, 200)->header('Content-Type', 'image/png');
    }
}
