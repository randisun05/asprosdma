<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PublicPost;
use GuzzleHttp\RetryMiddleware;
use PhpParser\Node\Stmt\Return_;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('status', 'submission')
             ->when(request()->q, function($query) {
                 $query->where('title', 'like', '%' . request()->q . '%');
             })
             ->with('member','category')
             ->latest()
             ->paginate(10);
            
             $publishs = PublicPost::
             when(request()->q, function($query) {
                 $query->where('title', 'like', '%' . request()->q . '%');
             })
             ->with('post','post.category','post.member')
             ->latest()
             ->paginate(10);

             $categories = Category::
             when(request()->q, function($query) {
                 $query->where('title', 'like', '%' . request()->q . '%');
             })
             ->latest()
             ->paginate(10);
          
        //append query string to pagination links
        $posts->appends(['q' => request()->q]);
        $publishs->appends(['q' => request()->q]);
        $categories->appends(['q' => request()->q]);
    
       
        return inertia('Admin/Posts/Index', [
            'posts' => $posts,
            'publishs' => $publishs,
            'categories' => $categories
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::get();
        return inertia('Admin/Posts/Create', [
           'categories' => $categories
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
        'body' => 'required|',
        'document' => 'file|mimes:pdf|max:2048|nullable',
        'image' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
    ]);

    $slug = strtolower(str_replace(' ', '-', $request->title));
    $body = $request->body;

    // Ambil 100 kata pertama dari body
    // Hapus tag HTML dari body
    $bodyWithoutTags = strip_tags($body);
    $words = str_word_count($bodyWithoutTags, 1);
    $excerpt = implode(' ', array_slice($words, 0, 50));

    // Tambahkan "..." jika body memiliki lebih dari 100 kata
    if (count($words) > 50) {
        $excerpt .= '...';
    }
    $today = Carbon::now()->format('Y-m-d H:i:s');

    // Store the file using Laravel's file storage system
    $document = $request->file('document');
    if ($document) {
        $document = $request->file('document')->storePublicly('/documents');
        // Proceed with storing or processing the uploaded file
    };

    $image = $request->file('picture');
    if ($image) {
        $image = $request->file('picture')->storePublicly('/images');
        // Proceed with storing or processing the uploaded file
    };
    

        Post::create([
            'title' => $request->title,
            'category_id' => $request->category,
            'body' =>  $request->body,
            'slug' => $slug,
            'excerpt' => $excerpt,
            'image' => $image,
            'document' => $document,
            'publish_at' => $today,
            'member_id' => 1,
            'status' => 'submission',
        ]);

    

     //redirect
     return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::findOrFail($id)->with('member','category')->first();
        return inertia('Admin/Posts/Show', [
           'post' => $post
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
        $post = Post::findOrFail($id);
        $categories = Category::get();
        return inertia('Admin/Posts/Edit', [
           'post' => $post,
           'categories' => $categories
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
       // Validate request including file validation
      $request->validate([
        'title' => 'required|string',
        'body' => 'required|',
        'document' => 'file|mimes:pdf|max:2048|nullable',
        'image' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
    ]);

    $slug = strtolower(str_replace(' ', '-', $request->title));
    $body = $request->body;

    // Ambil 100 kata pertama dari body
    // Hapus tag HTML dari body
    $bodyWithoutTags = strip_tags($body);
    $words = str_word_count($bodyWithoutTags, 1);
    $excerpt = implode(' ', array_slice($words, 0, 50));

    // Tambahkan "..." jika body memiliki lebih dari 100 kata
    if (count($words) > 50) {
        $excerpt .= '...';
    }
    $today = Carbon::now()->format('Y-m-d H:i:s');

    // Store the file using Laravel's file storage system
    $document = $request->file('document');
    if ($document) {
        $document = $request->file('document')->storePublicly('/documents');
        // Proceed with storing or processing the uploaded file
    };

    $image = $request->file('picture');
    if ($image) {
        $image = $request->file('picture')->storePublicly('/images');
        // Proceed with storing or processing the uploaded file
    };
    

        Post::where('id',$id)->update([
            'title' => $request->title,
            'category_id' => $request->category,
            'body' =>  $request->body,
            'slug' => $slug,
            'excerpt' => $excerpt,
            'image' => $image,
            'document' => $document,
            'publish_at' => $today,
            'member_id' => 1,
            'status' => 'submission',
        ]);

    

     //redirect
     return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->delete();

        //redirect
        return redirect()->route('admin.posts.index');
    }

    public function approve($id)
    {
        $post = Post::findOrFail($id);

        $post->update([
            'status' => 'approved'
        ]);

        PublicPost::create([
            'post_id' => $post->id
        ]);

        //redirect
        return redirect()->route('admin.posts.index');
    }
    
    public function return($id)
    {
        $post = Post::findOrFail($id);

        $post->update([
            'status' => 'perlu ada perbaikan'
        ]);
        //redirect
        return redirect()->route('admin.posts.index');
    }

    public function reject($id)
    {
        $post = Post::findOrFail($id);

        $post->update([
            'status' => 'rejected'
        ]);
        //redirect
        return redirect()->route('admin.posts.index');
    }

    public function Cancel($id)
    {
        
        $public = PublicPost::findOrFail($id);
        $post   = Post::where('id', $public->post_id);
        $post->update([
            'status' => 'rejected'
        ]);
        $public->delete();

        //redirect
        return redirect()->route('admin.posts.index',['activeTab','approved']);
        
    }

   
}
