<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\Pow;
use Illuminate\Support\Carbon;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::where('member_id', auth()->guard('member')->user()->id)
        ->when(request()->q, function($query) {
            $query->where('title', 'like', '%' . request()->q . '%');
        })
        ->with('member','category')
        ->latest()
        ->paginate(10);

        

        //append query string to pagination links
        $posts->appends(['q' => request()->q]);
    
       
        return inertia('User/Posts/Index', [
            'posts' => $posts,
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
        return inertia('User/Posts/Create', [
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
            'member_id' => auth()->guard('member')->user()->id,
        ]);

    

     //redirect
     return redirect()->route('user.posts.index');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::where('id',$id)->with('member','category')->first();
      
        return inertia('User/Posts/Show', [
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
        return inertia('User/Posts/Edit', [
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
         
      return $request;
        $post = Post::findOrFail($id);
   
    // Validate request including file validation
    $request->validate([
        'title' => 'required|string',
        'body' => 'required',
        'document1' => 'nullable|file|mimes:pdf|max:2048', // Dokumen opsional
        'picture1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Gambar opsional
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
    
      // Store the file using Laravel's file storage system
      $document = $request->file('document1');
      if ($document) {
          $document = $request->file('document')->storePublicly('/documents');
          // Proceed with storing or processing the uploaded file
      };

  
      $image = $request->file('picture1');
      if ($image) {
          $image = $request->file('picture')->storePublicly('/images');
          // Proceed with storing or processing the uploaded file
      };
      
  
          $post->update([
              'title' => $request->title,
              'category_id' => $request->category,
              'body' =>  $request->body,
              'slug' => $slug,
              'excerpt' => $excerpt,
              'image' => $image,
              'document' => $document,
              
          ]);

    //redirect
    return redirect()->route('user.posts.index');

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
        return redirect()->route('user.posts.index');
    }

    public function submission($id)
    {
        $post = Post::findOrFail($id);

        $post->update([
            'status' => 'submission'
        ]);

        //redirect
        return redirect()->route('user.posts.index');
    }
}
