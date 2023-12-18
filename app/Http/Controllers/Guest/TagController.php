<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\View\View;

class TagController extends Controller
{
    public function tags(): View
    {
        if (!request('search')) {
            $tags = Tag::with('posts')
            ->latest()
            ->get();
        } else {
            $tags = Tag::with('posts')
            ->latest()
            ->where('title', 'like', '%' . request('search') . '%')
            ->get();
        }
        
        return view('guest.tag', compact('tags'));
    }
}
