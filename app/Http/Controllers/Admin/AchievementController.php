<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use App\Models\Achievement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datas = Achievement::
             when(request()->q, function($query) {
                 $query->where('title', 'like', '%' . request()->q . '%');
             })
             ->latest()
             ->paginate(10);

        $datas->appends(['q' => request()->q]);

        return inertia('Admin/Achievements/Index', [
            'datas' => $datas,
         ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $members = Member::all();
            return inertia('Admin/Achievements/Create', [
                'members' => $members,
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

        $request->validate([
            'nip' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string|max:255',
            'date' => 'required|date',
            'image' => '',
            'document' => '',
            'icon' => 'required|string|max:255',
        ]);

        $memberId = Member::where('nip', $request->nip)->first()->id;
        // $image = $request->file('image');
        // $imageName = 'achievement-' . time() . '.' . $image->getClientOriginalExtension();
        // $image->storeAs('public/achievements', $imageName);

        // $document = $request->file('document');
        // $documentName = 'achievement-doc-' . time() . '.' . $document->getClientOriginalExtension();
        // $document->storeAs('public/achievements', $documentName);

        Achievement::create([
            'member_id' => $memberId,
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'category' => $request->category,
            // 'image' => $imageName,
            // 'document' => $documentName,
            'icon' => $request->icon,
            'status' => '1',
        ]);

        return redirect()->route('admin.achievements.index')->with('success', 'Achievement created successfully.');
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
    public function edit($id)
    {
        //
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
        //
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
