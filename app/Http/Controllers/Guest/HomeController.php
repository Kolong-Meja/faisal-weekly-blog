<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Models\Feedback;
use App\Http\Requests\Guest\FeedbackRequest;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $posts = DB::table('post_images')
        ->join('posts', 'post_images.post_id', '=', 'posts.id')
        ->join('images', 'post_images.image_id', '=', 'images.id')
        ->select('posts.*', 'images.image', 'images.owner', 'images.url')
        ->latest()
        ->limit(15)
        ->get();
        
        $categories = DB::table('categories')
        ->select('id', 'title', 'slug', 'created_at')
        ->latest()
        ->limit(18)
        ->get();
        
        foreach($posts as $post) {
            $post->title = Str::limit($post->title, 100);
            $post->sub_title = Str::limit($post->sub_title, 100);
            $word_count = str_word_count(strip_tags($post->content));
            $reading_duration = ceil($word_count / 300);
            $post->reading_duration = $reading_duration;
        }
        
        return view('guest.home', compact('posts', 'categories'));
    }

    public function feedback(FeedbackRequest $request): JsonResponse
    {
        $data = $request->validated();
        
        $bad_words = [
            "asshole", "dick", "bitch", 
            "son of a bitch", "doggy", "gay",
            "lesbian", "motherfucker", "fuckin",
            "fuck", "anj", "anjing", "ngentot",
            "babi", "biadap", "bacot", "kontol",
            "memek", "peju", "tai", "nigga", "nigger",
        ];
        
        $filtered_content = str_ireplace($bad_words, "[censored]", strtolower($data['content']));
        
        $feedback = Feedback::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'content' => $filtered_content,
        ]);
        
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Feedback successfully send!',
            'feedback' => $feedback,
        ]);
    }

    public function portfolio()
    {
        return view('parts.portfolio');
    }
}
