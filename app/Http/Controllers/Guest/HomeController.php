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
    protected function postAuthorName(): string
    {
        $authorName = "";

        $postsUser = DB::table('posts')
        ->join('users', 'posts.user_id', "=", "users.id")
        ->select(
            'posts.*', 
            'users.id AS author_id', 
            'users.name AS author_name'
        )
        ->get();
        
        foreach($postsUser as $postUser) {
            $authorName = $postUser->author_name;
        } 

        return $authorName;
    }

    protected function filteredContent(array $badWords, $validatedData): array | string
    {
        return str_ireplace($badWords, "[censored]", strtolower($validatedData)); 
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $posts = DB::table('post_images')
        ->join('posts', 'post_images.post_id', '=', 'posts.id')
        ->join('images', 'post_images.image_id', '=', 'images.id')
        ->select(
            'posts.*', 
            'images.image', 
            'images.owner', 
            'images.url'
        )
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
            $post->description = Str::limit($post->description, 100);
            $word_count = str_word_count(strip_tags($post->content));
            $reading_duration = ceil($word_count / 300);
            $post->reading_duration = $reading_duration;
        }

        $authorName = $this->postAuthorName();
        
        return view('guest.home', compact('posts', 'categories', 'authorName'));
    }

    public function feedback(FeedbackRequest $request): JsonResponse
    {
        $data = $request->validated();
        
        $badWords = [
            "arse", "arsehead", "arsehole", "ass", "asshole", 
            "bastard", "bitch", "bloody", "bollocks", "brotherfucker", 
            "bugger", "bullshit", "child-fucker", "christ on a bike", "cock", 
            "cocksucker", "crap", "cunt", "cyka blyat", "damn", "damn it", 
            "dick", "dickhead", "dyke", "fatherfucker", "frigger", "fuck", 
            "goddamn", "godsdamn", "hell", "holy shit", "horseshit", "in shit", 
            "Jesus fuck", "Jesus wept", "kike", "mortherfucker", "nigga", "nigra", 
            "pigfucker", "piss", "prick", "pussy", "shit", "shit ass", "shite", 
            "sisterfucker", "slut", "son of a whore", "son of a bitch", "spastic", 
            "sweet jesus", "turd", "twat", "wanker"
        ];
        
        $feedback = Feedback::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'content' => $this->filteredContent($badWords, $data['content']),
        ]);
        
        return response()->json([
            'success' => true,
            'status' => 201,
            'message' => 'Feedback successfully send!',
            'feedback' => $feedback,
        ]);
    }

    public function portfolio()
    {
        return view('guest.portfolio');
    }
}
