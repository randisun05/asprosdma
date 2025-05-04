<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\ReactDetail;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['member','category', 'react' => function($query) {
            $query->where('type', 'post');
        }])
        ->when(request()->q, function($query) {
            $query->where('title', 'like', '%' . request()->q . '%');
        })
        ->where('status', 'approved')
        ->where('category_id', '!=', 3)
        ->latest()
        ->paginate(6);

        $posts->appends(['q' => request()->q]);

        return inertia('Public/Website/Posts/Index', [
            'title' => "Berita",
            'posts' => $posts
        ]);
    }


    public function articles()
    {
        $posts = Post::with(['member','category', 'react' => function($query) {
            $query->where('type', 'post');
        }])
        ->when(request()->q, function($query) {
            $query->where('title', 'like', '%' . request()->q . '%');
        })
        ->where('status', 'approved')
        ->where('category_id', 3)
        ->latest()
        ->paginate(6);

        $posts->appends(['q' => request()->q]);

        return inertia('Public/Website/Posts/Index', [
            'title' => "SDMA Menulis",
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // Get the related category of the post
        $user = auth()->guard('member')->user();

        if ($user) {

           $exist = ReactDetail::where('post_id', $post->id)->where('member_id', $user->id)->where('react_id', '3')->first();

           if (!$exist) {
               $react = ReactDetail::create([
                   'post_id' => $post->id,
                   'member_id' => $user->id,
                   'react_id' => '3',
                   'status' => '1',
                   'type' => 'post'
               ]);
           }

        }

       $category = $post->category;
       $member = $post->member;

       return inertia('Public/Website/Posts/Show', [
           'title' => $post->title,
           'post' => $post,
           'category' => $category,
           'member' => $member
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
