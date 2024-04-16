<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Merchan;
use App\Models\Post;
use App\Models\PublicPost;
use App\Models\Registration;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $regissub = Registration::count();
        $regispaid = Registration::where('status','paid')->count();
        $regisconfirm = Registration::where('status','confirm')->count();
        $regisaccepted = Registration::where('status','approved')->count();
        $regisrejected = Registration::where('status','rejected')->count();
        $sendpayment = Registration::where('emailstatus', '!=', 0)->count();

        $postsubmission = Post::where('status','submission')->count();
        $postpublis = Post::where('status','approved')->count();

        $event = Event::count();
        $eventactive = Event::where('status','active')->count();

        $merchan = Merchan::count();


        return inertia('Admin/Dashboard/Index', [
            'regissub' => $regissub,
            'regispaid' => $regispaid,
            'regisconfirm' => $regisconfirm,
            'regisaccepted' => $regisaccepted,
            'regisrejected' => $regisrejected,
            'postsubmission' => $postsubmission,
            'postpublis' => $postpublis,
            'event' => $event,
            'eventactive' => $eventactive,
            'merchan' => $merchan,
            'sendpayment' => $sendpayment,
        ]);
    }
}
