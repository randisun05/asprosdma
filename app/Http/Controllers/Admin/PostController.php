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
        $this->cekAuth();
        $posts = Post::where('status', 'submission')
             ->when(request()->q, function($query) {
                 $query->where('title', 'like', '%' . request()->q . '%');
             })
             ->with('member','category','react')
             ->latest()
             ->paginate(10);

             $publishs = PublicPost::with('post','post.category','post.member','post.react')
             ->latest()
             ->paginate(10);

             $limiteds = Post::where('status', 'limited')
             ->when(request()->q, function($query) {
                 $query->where('title', 'like', '%' . request()->q . '%');
             })

             ->with('member','category','react')
             ->latest()
             ->paginate(10);

             $categories = Category::latest()
             ->paginate(10);

        //append query string to pagination links
        $posts->appends(['q' => request()->q]);

        return inertia('Admin/Posts/Index', [
            'posts' => $posts,
            'publishs' => $publishs,
            'categories' => $categories,
            'limiteds' => $limiteds
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->cekAuth();

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

        $this->cekAuth();

       // Validate request including file validation
      $request->validate([
        'title' => 'required|string',
        'body' => 'required|',
        'document' => 'file|mimes:pdf|max:2048|nullable',
        'image' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
    ]);

    // Generate initial slug from title
    $slug = strtolower(str_replace(' ', '-', $request->title));
    $originalSlug = $slug;
    $counter = 1;

    // Check if the generated slug is unique, if not, append a number
    while (Post::where('slug', $slug)->exists()) {
        $slug = $originalSlug . '-' . $counter;
        $counter++;
    }

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

        $this->cekAuth();
        $post = Post::with('member','category','react')->findOrFail($id);

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
        $this->cekAuth();
        $post = Post::with('member','category','react')->findOrFail($id);
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
        $this->cekAuth();
       // Validate request including file validation
      $request->validate([
        'title' => 'required|string',
        'body' => 'required|',

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
    } else {
        $document = Post::where ('id', $id)->value('document');
    };

    $image = $request->file('picture');
    if ($image) {
        $image = $request->file('picture')->storePublicly('/images');
        // Proceed with storing or processing the uploaded file
    } else {
        $image = Post::where ('id', $id)->value('image');
    };

        Post::where('id', $id)->update([
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
        $this->cekAuth();

        $post = Post::findOrFail($id);

        $post->delete();

        //redirect
        return redirect()->route('admin.posts.index');
    }

    public function approve($id)
    {

        $this->cekAuth();

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

        $this->cekAuth();

        $post = Post::findOrFail($id);

        $post->update([
            'status' => 'perlu ada perbaikan'
        ]);
        //redirect
        return redirect()->route('admin.posts.index');
    }

    public function reject($id)
    {
        $this->cekAuth();

        $post = Post::findOrFail($id);

        $post->update([
            'status' => 'rejected'
        ]);
        //redirect
        return redirect()->route('admin.posts.index');
    }

    public function cancel($id)
    {
        $this->cekAuth();
        $public = PublicPost::findOrFail($id);
        $post   = Post::where('id', $public->post_id);

            $post->update([
                'status' => 'return'
            ]);

        $public->delete();

        //redirect
        return redirect()->route('admin.posts.index');

    }

    public function cancelLimited($id)
    {
        $this->cekAuth();
        $post   = Post::where('id', $id)->first();

            $post->update([
                'status' => 'return'
            ]);

        //redirect
        return redirect()->route('admin.posts.index');

    }

    public function limited($id)
    {
        $this->cekAuth();
        $post = Post::findOrFail($id);

        $post->update([
            'status' => 'limited'
        ]);


        //redirect
        return redirect()->route('admin.posts.index');

    }

    public function submission($id)
    {
        $this->cekAuth();
        $post = Post::findOrFail($id);

        $post->update([
            'status' => 'submission'
        ]);


        //redirect
        return redirect()->route('admin.posts.list');

    }

    public function categoryCreate()
    {
        $this->cekAuth();
        return inertia('Admin/Posts/CreateCategory', [
         ]);
        //redirect
        return redirect()->route('admin.posts.index');

    }

    public function categoryStore(Request $request)
    {
        $this->cekAuth();
        $request->validate([
            'title' => 'required|unique:categories',
        ] , [
            'title.unique' => 'Kategori sudah tersedia'
        ]);

        Category::create([
            'title' => $request->title
        ]);

        return redirect()->route('admin.posts.index');

    }

    public function list()
    {
        $this->cekAuth();

        $posts = Post::where('member_id', '1')
        ->when(request()->q, function($query) {
            $query->where('title', 'like', '%' . request()->q . '%');
        })
        ->with('member','category','react')
        ->latest()
        ->paginate(10);



   //append query string to pagination links
        $posts->appends(['q' => request()->q]);

        return inertia('Admin/Posts/List', [
            'posts' => $posts,

            ]);
    }

    public function cekAuth()
    {
        if(!auth()->check()) {
            auth()->logout(); // Log out the user programmatically
            return redirect()->route('login')->with('warning', 'Anda tidak memiliki akses');
        }
    }



}
