<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Category;

class CategoryController extends Controller
{
    public function categories(): View
    {
        if (!request('search')) {
            $categories = Category::with('posts')
            ->latest()
            ->get();
        } else {
            $categories = Category::latest()
            ->with('posts')
            ->where('title', 'like', '%' . request('search') . '%')
            ->get();
        }

        return view('guest.category', compact('categories'));
    }
}
