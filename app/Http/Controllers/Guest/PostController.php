<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;
use App\Models\Post;
use App\Models\Category;
use Carbon\Carbon;


class PostController extends Controller
{
     /**
     * Display a listing of the resource.
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        if (!request('filter') && !request('search')) {
            $post_images = DB::table('post_images')
            ->join('posts', 'post_images.post_id', '=', 'posts.id')
            ->join('images', 'post_images.image_id', '=', 'images.id')
            ->select('posts.*', 'images.image', 'images.owner', 'images.url')
            ->orderBy('posts.created_at', 'DESC')
            ->paginate(30);
        }
        
        if (request('search')) {
            $post_images = DB::table('post_images')
            ->join('posts', 'post_images.post_id', '=', 'posts.id')
            ->join('images', 'post_images.image_id', '=', 'images.id')
            ->select('posts.*', 'images.image', 'images.owner', 'images.url')
            ->where('posts.title', 'like', '%' . request('search') . '%')
            ->orderBy('posts.created_at', 'DESC')
            ->paginate(30);
        }

        if (request("filter")) {
            if (!request('filter') != 'newest') {
                $post_images = Post::join('post_images', 'post_images.post_id', '=', 'posts.id')
                ->join('images', 'post_images.image_id', '=', 'images.id')
                ->select('posts.*', 'images.image', 'images.owner', 'images.url')
                ->orderBy('posts.created_at', 'ASC')
                ->paginate(30);
            }
            
            if (request("filter") == "newest") {
                $post_images = Post::join('post_images', 'post_images.post_id', '=', 'posts.id')
                ->join('images', 'post_images.image_id', '=', 'images.id')
                ->select('posts.*', 'images.image', 'images.owner', 'images.url')
                ->orderBy('posts.created_at', 'DESC')
                ->paginate(30);
            }
        }
        
        foreach($post_images as $post_image) {
            $post_image->short_content = Str::limit($post_image->content, 300);
            $post_image->short_title = Str::limit($post_image->title, 100);
            $word_count = str_word_count(strip_tags($post_image->content));
            $reading_duration = ceil($word_count / 300);
            $post_image->reading_duration = $reading_duration;
        }
        
        return view('guest.post', compact('post_images'));
    }
    /**
     * Display the specified resource.
     * @property string $slug This the post slug
     * @return \Illuminate\View\View
     */
    public function show(string $slug): View
    {
        $post_image = DB::table('post_images')
        ->join('posts', 'post_images.post_id','=', 'posts.id')
        ->join('images', 'post_images.image_id', '=', 'images.id')
        ->select('images.*')
        ->where('posts.slug', $slug)
        ->first();
        
        $post_user = Post::with('user')
        ->where('slug', $slug)
        ->first();
        
        $post_tags = Post::with('tags')
        ->where('slug', $slug)
        ->first();
        
        $post_date = Carbon::parse($post_user->created_at)->toFormattedDateString();
        
        $word_count = str_word_count(strip_tags($post_user->content));
        
        $reading_duration = ceil($word_count / 300);
        
        return view('parts.home.post.detail', compact(
            'post_image', 
            'post_user',
            'post_tags', 
            'post_date',
            'reading_duration'
        ));
    }
    /**
     * Display all posts by it's category
     * @property string $slug This is the category slug
     * @return \Illuminate\View\View
     */
    public function category(string $slug): View
    {
        if (!request('filter') && !request('search')) {
            $post_categories = Post::with('images')
            ->select('*')
            ->whereHas('categories', function(Builder $query) use ($slug) {
                $query->where('slug', $slug);
            })->latest()->paginate(30);

            $category_title = Category::select('title', 'slug')
            ->where('slug', $slug)
            ->first();
        }

        if (request('search')) {
            $post_categories = Post::with('images')
            ->select('*')
            ->whereHas('categories', function(Builder $query) use ($slug) {
                $query->where('slug', $slug);
            })->where('title', 'like', '%' . request('search') . '%')
            ->latest()
            ->paginate(30);  
            
            $category_title = Category::select('title', 'slug')
            ->where('slug', $slug)
            ->first();
        } 

        if (request('filter')) {
            if (!request('filter') != 'newest') {
                $post_categories = Post::with('images')
                ->select('*')
                ->whereHas('categories', function(Builder $query) use ($slug) {
                    $query->where('slug', $slug);
                })->oldest()->paginate(30);  

                $category_title = Category::select('title', 'slug')
                ->where('slug', $slug)
                ->first();
            }

            if (request('filter') == 'newest') {
                $post_categories = Post::with('images')
                ->select('*')
                ->whereHas('categories', function(Builder $query) use ($slug) {
                    $query->where('slug', $slug);
                })->latest()
                ->paginate(30);

                $category_title = Category::select('title', 'slug')
                ->where('slug', $slug)
                ->first();
            }
        }

        foreach($post_categories as $post_category) {
            $post_category->short_content = Str::limit($post_category->content, 300);
            $post_category->short_title = Str::limit($post_category->title, 100);
            $word_count = str_word_count(strip_tags($post_category->content));
            $reading_duration = ceil($word_count / 300);
            $post_category->reading_duration = $reading_duration;
        }
        
        return view('parts.home.category.post.index', compact(
            'post_categories', 
            'category_title'
        ));
    }

    /**
     * Display all posts by it's tag
     * @property string $slug This is the tag slug
     * @return \Illuminate\View\View
     */
    public function tag(string $slug): View
    {
        if (!request('filter') && !request('search')) {
            $post_tags = Post::with('images')
            ->select('*')
            ->whereHas('tags', function(Builder $query) use ($slug) {
                $query->where('slug', $slug);
            })->latest()->paginate(30);

            $tag_title = Tag::select('title', 'slug')
            ->where('slug', $slug)
            ->first();
        }

        if (request('search')) {
            $post_tags = Post::with('images')
            ->select('*')
            ->whereHas('tags', function(Builder $query) use ($slug) {
                $query->where('slug', $slug);
            })->where('title', 'like', '%' . request('search') . '%')
            ->latest()
            ->paginate(30);

            $tag_title = Tag::select('title', 'slug')
            ->where('slug', $slug)
            ->first();
        }

        if (request('filter')) {
            if (!request('filter') != 'newest') {
                $post_tags = Post::with('images')
                ->select('*')
                ->whereHas('tags', function(Builder $query) use ($slug) {
                    $query->where('slug', $slug);
                })->oldest()->paginate(30);

                $tag_title = Tag::select('title', 'slug')
                ->where('slug', $slug)
                ->first();
            }

            if (request('filter') == 'newest') {
                $post_tags = Post::with('images')
                ->select('*')
                ->whereHas('tags', function(Builder $query) use ($slug) {
                    $query->where('slug', $slug);
                })->latest()->paginate(30);

                $tag_title = Tag::select('title', 'slug')
                ->where('slug', $slug)
                ->first();
            }
        }

        foreach($post_tags as $post_tag) {
            $post_tag->short_content = Str::limit($post_tag->content, 300);
            $post_tag->short_title = Str::limit($post_tag->title, 100);
            $word_count = str_word_count(strip_tags($post_tag->content));
            $reading_duration = ceil($word_count / 300);
            $post_tag->reading_duration = $reading_duration;
        }
        
        return view('parts.home.tag.post.index', compact(
            'post_tags',
            'tag_title'
        ));
    }
}
