<?php

namespace App\Http\Controllers\Admin;

use App\Models\Merchan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MerchanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchans = Merchan::
        when(request()->q, function($query) {
            $query->where('title', 'like', '%' . request()->q . '%');
        })
        ->latest()
        ->paginate(10);

        $merchans->appends(['q' => request()->q]);

            return inertia('Admin/Merchans/Index', [
            'merchans' => $merchans,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('Admin/Merchans/Create', [

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
                'title' => 'required|string',
                'image' => 'required|',
                'body' => 'required',
                'how' => 'required',
                'price' => 'required'
            ]);

    $image = $request->file('image');
    if ($image) {
        $image = $request->file('image')->storePublicly('/images');
        // Proceed with storing or processing the uploaded file
    };

        Merchan::create([
            'title' => $request->title,
            'image' =>  $image,
            'body' => $request->body,
            'how' => $request->how,
            'status' => $request->status,
            'subtitle' => $request->subtitle,
            'color' => $request->color,
            'price' => $request->price,
            'status' => "active",
        ]);

     //redirect
     return redirect()->route('admin.merchans.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $merchan = Merchan::findOrFail($id);
        return inertia('Admin/Merchans/Show', [
         'merchan' => $merchan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $merchan = Merchan::findOrFail($id);
        return inertia('Admin/Merchans/Edit', [
         'merchan' => $merchan
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

                //Validate request including file validation
                $request->validate([
                    'title' => 'required|string',
                    'body' => 'required',
                    'how' => 'required',
                    'price' => 'required'
                ]);

            $image = $request->file('image');
            if ($image) {
            $image = $request->file('image')->storePublicly('/images');
            // Proceed with storing or processing the uploaded file
            }

            Merchan::where('id',$id)->update([
                'title' => $request->title,
                'image' =>  $image,
                'body' => $request->body,
                'how' => $request->how,
                'status' => $request->status,
                'subtitle' => $request->subtitle,
                'color' => $request->color,
                'price' => $request->price,
            ]);


            //redirect
            return redirect()->route('admin.merchans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $merchan = Merchan::findOrFail($id);

        $merchan->delete();

        //redirect
        return redirect()->route('admin.merchans.index');
    }
}
