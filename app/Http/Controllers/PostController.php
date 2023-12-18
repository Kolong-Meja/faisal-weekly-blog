<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Requests\PostRequest;
use App\Http\Requests\ImageRequest;
use App\Models\Image;
use App\Models\Post;
use Carbon\Carbon;


class PostController extends Controller
{
    public function index(): View
    {
        $posts = DB::table('posts')
        ->join('users', 'posts.user_id', '=', 'users.id')
        ->select('posts.id AS post_id', 
            'posts.title', 'posts.meta_title', 
            'posts.description', 'posts.keywords', 
            'posts.slug', 'posts.created_at', 
            'posts.updated_at', 'posts.status',
            'users.id AS user_id', 'users.name AS user_name'
        )
        ->orderBy('post_id', 'ASC')
        ->paginate(10);

        foreach($posts as $post) {
            $post->short_title = Str::limit($post->title, 100);
            $post->short_description = Str::limit($post->description, 100);
        }
        return view('admin.post', compact('posts'));
    }

    public function detail(string $slug): View
    {
        $post_image = DB::table('post_images')
        ->join('posts', 'post_images.post_id','=', 'posts.id')
        ->join('images', 'post_images.image_id', '=', 'images.id')
        ->select('images.*')
        ->where('posts.slug', $slug)
        ->first();

        $post_user = Post::with('user')
        ->select('*')
        ->where('slug', $slug)
        ->first();

        $post_tags = Post::with('tags')
        ->select('*')
        ->where('slug', $slug)
        ->first();

        $post_date = Carbon::parse($post_user->created_at)->toFormattedDateString();
        
        $word_count = str_word_count(strip_tags($post_user->content));
        
        $reading_duration = ceil($word_count / 300);

        return view('admin.detail.post', compact(
            'post_image', 
            'post_user', 
            'post_tags', 
            'post_date', 
            'reading_duration'
        ));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View | RedirectResponse
    {
        $amountOfTagData = DB::table('tags')
        ->select('id', 'title')
        ->count();
        
        $amountOfCategoryData = DB::table('categories')
        ->select('id', 'title')
        ->count();

        if (($amountOfTagData < 1 || $amountOfCategoryData < 1) || 
            ($amountOfTagData < 1 && $amountOfCategoryData < 1)) {
            session()->flash("error", "You cannot create post with empty tag and category");
            return redirect()->route("post.index");
        }

        $author_id = Auth::user()->id;
        
        $tags = DB::table('tags')
            ->select('id', 'title')
            ->get();
        
            $categories = DB::table('categories')
            ->select('id', 'title')
            ->get();
        
        return view('admin.create.post', compact(['tags', 'categories', 'author_id']));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(
        PostRequest $req_post, 
        ImageRequest $req_image
        ): RedirectResponse
    {
        $req_post->validated();
        
        $post = Post::create([
            'user_id' => $req_post->input('user_id'),
            'title' => $req_post->title,
            'description' => $req_post->sub_title,
            'meta_title' => $req_post->meta_title,
            'slug' => $req_post->slug,
            'content' => $req_post->content,
            'keywords' => $req_post->keywords,
            'status' => 'not verified'
        ]);
        
        $req_image->validated();
        
        $image = $req_image->file('image');
        
        $get_image_original_name = $image->getClientOriginalName();
        
        $image->move(public_path('images/'), $get_image_original_name);
        
        $image = Image::create([
            'image' => $get_image_original_name,
            'owner' => $req_image->owner,
            'url' => $req_image->url,
        ]);

        if (!empty($req_post->input('tag'))) {
            $post->tags()->attach($req_post->input('tag'));
        }

        if (!empty($req_post->input('category'))) {
            $post->categories()->attach($req_post->input('category'));
        }

        $post->images()->attach($image->id);
        
        session()->flash('success', 'Post successfully created');
        return redirect()->route('post.index');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug): View
    {
        $author = Auth::user()->id;
        
        $post = Post::where('slug', $slug)
            ->with('images')
            ->first();
        
        $tags = DB::table('tags')
            ->select('id', 'title')
            ->get();
        
            $categories = DB::table('categories')
            ->select('id', 'title')
            ->get();
        
        $data = [];
        
        foreach ($post->images as $image) {
            $owner = $image->owner;
            $url = $image->url;
            array_push($data, $owner, $url);
        }
        
        return view('admin.edit.post-edit', compact([
            'post', 
            'tags', 
            'categories', 
            'data', 
            'author'
        ]));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(
        PostRequest $req_post, 
        ImageRequest $req_image, $slug
        ): RedirectResponse
    {
        /**
         * melakukan validasi lanjutan terhadap data yang ingin di update
         */
        $post = Post::where('slug', $slug)
            ->with('images')
            ->first();
        
        $req_post->validated();
        
        $post->update([
            'user_id' => $req_post->input('user_id'),
            'title' => $req_post->title,
            'description' => $req_post->description,
            'meta_title' => $req_post->meta_title,
            'slug' => $req_post->slug,
            'content' => $req_post->content,
            'keywords' => $req_post->keywords
        ]);
        
        $req_image->validated();
        
        // image is required!
        $image = $req_image->file('image');
        
        $get_image_original_name = $image->getClientOriginalName();
        
        $image->move(public_path('images/'), $get_image_original_name);
        
        foreach ($post->images as $image) {
            $image->update([
                'image' => $get_image_original_name,
                'owner' => $req_image->owner,
                'url' => $req_image->url,
            ]);
        }
        
        if (!is_null($post->tags)) {
            $post->tags()->syncWithoutDetaching($req_post->input('tag'));
        } else {
            $post->tags()->attach($req_post->input('tag'));
        }

        if (!is_null($post->categories)) {
            $post->categories()->syncWithoutDetaching($req_post->input('category'));
        } else {
            $post->categories()->attach($req_post->input('category'));
        }

        if (!is_null($post->images)) {
            $post->images()->syncWithoutDetaching($image->id);
        } else {
            $post->images()->attach($image->id);
        }

        session()->flash('success', 'Post successfully updated');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $authUserRole = optional(Auth::user())->role;

        if ($authUserRole !== "super admin") {
            session()->flash("error", "You don't have permission to remove post data.");
            return redirect()->route("post.index");
        }

        $post = Post::findOrFail($id);
        
        if (!$post) {
            abort(404, 'Post not found!');
        }
        
        Storage::disk('public')->delete('images/'.$post->image);
        
        $post->tags()->detach();
        
        $post->categories()->detach();
        
        $post->images()->detach();
        
        $post->delete();
        
        session()->flash('success', 'Post successfully removed');
        return redirect()->route('post.index');
    }
}