<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\DetailEvent;
use App\Models\Question;
use Illuminate\Http\Request;
use SebastianBergmann\Timer\Duration;

class TryoutController extends Controller
{


public function index()
    {
        //get exam group
        $detail_events = DetailEvent::with('event', 'member')
                    ->where('member_id', auth()->guard('member')->user()->id)
                    ->whereHas('event', function($query){
                        $query->where('category', 'tryout');
                    })
                    ->get();

        //return with inertia
        return inertia('User/Tryouts/Index', [
            'detail_events' => $detail_events,
        ]);
    }
   public function confirmation($id)
    {
        //get exam group
        $detail_event = DetailEvent::with('event', 'member')
                    ->where('member_id', auth()->guard('member')->user()->id)
                    ->where('id', $id)
                    ->first();

        if ($detail_event->event->duration == null) {
            DetailEvent::where('id', $detail_event->id)->update([
                'duration' => $detail_event->event->duration
            ]);
        } else {
            DetailEvent::where('id', $detail_event->id)->update([
                'duration' => 6000000
            ]);
        }

        //return with inertia
        return inertia('User/Tryouts/Confirmation', [
            'detail_event' => $detail_event,
        ]);
    }

    public function startExam($id)
{
    $member = auth()->guard('member')->user();

    $detail = DetailEvent::with('event')
        ->where('id', $id)
        ->where('member_id', $member->id)
        ->firstOrFail();

    // jika belum mulai ujian
    if (!$detail->start_time) {

        $detail->update([
            'start_at' => now(),
            'duration'   => $detail->event->duration * 60000 // convert menit ke ms
        ]);

    }

    return redirect()->route('user.tryouts.show', [
        'id'   => $detail->id,
        'page' => 1
    ]);
}

    /**
     * show
     *
     * @param  mixed $id
     * @param  mixed $page
     * @return void
     */
    public function show($id,$page)
{
    $member = auth()->guard('member')->user();

    $detail = DetailEvent::with('event')
        ->where('id',$id)
        ->where('member_id',$member->id)
        ->firstOrFail();

    $answers = Answer::with('question')
        ->where('detail_event_id',$detail->id)
        ->orderBy('question_order')
        ->get();

    $active = $answers->where('question_order',$page)->first();


    return inertia('User/Tryouts/Show',[
        'id'=>$id,
        'page'=>$page,
        'detail_event'=>$detail,
        'all_questions'=>$answers,
        'question_active'=>$active,
        'question_answered'=>$answers->whereNotNull('answer')->count(),
        'answer_order'=>explode(',',$active->answer_order ?? '')
    ]);
}

    public function updateDuration(Request $request, $detail_event_id)
    {
        $detail_event = DetailEvent::find($detail_event_id);
        $detail_event->duration = $request->duration;
        $detail_event->update();

        return response()->json([
            'success'  => true,
            'message' => 'Duration updated successfully.'
        ]);
    }

    public function answerQuestion(Request $request)
{
    $member = auth()->guard('member')->user();

    $answer = Answer::where('detail_event_id',$request->detail_event_id)
        ->where('question_id',$request->question_id)
        ->where('member_id',$member->id)
        ->firstOrFail();

    $question = $answer->question;

    $isCorrect = $question->answer == $request->answer ? 'Y':'N';

    $answer->update([
        'answer'=>$request->answer,
        'is_correct'=>$isCorrect
    ]);

    return back();
}

     public function endExam(Request $request)
{
    $member = auth()->guard('member')->user();

    $detail = DetailEvent::where('id',$request->detail_event_id)
        ->where('member_id',$member->id)
        ->firstOrFail();

    $totalCorrect = Answer::where('detail_event_id',$detail->id)
        ->where('is_correct','Y')
        ->count();

    $totalQuestion = Answer::where('detail_event_id',$detail->id)->count();

    $grade = round(($totalCorrect/$totalQuestion)*100,2);

    $detail->update([
        'end_at'=>now(),
        'total_correct'=>$totalCorrect,
        'grade'=>$grade
    ]);

    return redirect()->route('user.tryouts.resultExam',$detail->id);
}

    public function resultExam($detail_event_id)
    {
        //get exam group
        $detail_event = DetailEvent::with('event', 'member')
                ->where('member_id', auth()->guard('member')->user()->id)
                ->where('id', $detail_event_id)
                ->first();

        //return with inertia
        return inertia('User/Tryouts/Result', [
            'detail_event' => $detail_event,
        ]);
    }
}
