<?php

namespace App\Repositories;

use App\Interfaces\GuestArticleInterface;
use App\Models\Article;
use App\Models\Category;
use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\View\View;

class GuestArticleRepository implements GuestArticleInterface {
    protected const MAX_LIMIT = 10;

    /**
     * Display articles page.
     */
    public function index(): View
    {
        // For search purpose.
        $searchRequest = request('search');

        if (!$searchRequest) {
            $articles = Article::with('user', 'categories')
            ->select('*')
            ->orderBy('created_at', 'ASC')
            ->limit($this::MAX_LIMIT)
            ->get();
        }

        if ($searchRequest !== '') {
            $articles = Article::with('user', 'categories')
            ->when($searchRequest, function (Builder $query) use ($searchRequest) {
                $query->where('title', 'LIKE', '%' . $searchRequest . '%')
                ->orWhereHas('user', function (Builder $query) use ($searchRequest) {
                    $query->where('name', 'LIKE', '%' . $searchRequest . '%');
                })
                ->orWhereHas('categories', function (Builder $query) use ($searchRequest) {
                    $query->where('name', 'LIKE', '%' . $searchRequest . '%');
                });
            })->orderBy('created_at', 'ASC')
            ->limit($this::MAX_LIMIT)
            ->get();
        }

        foreach($articles as $article) {
            $article->content = Str::limit($article->content, 200);
            $article->created_at = DateTime::createFromFormat('Y-m-d H:i:s', $article->created_at); 
        }

        return view('guest.article.index', compact(
            'articles',
        ));
    }

    /**
     * Display article detail page using slug.
     * 
     * @param string $slug Slug of the article.
     * 
     * @return Illuminate\View\View
     */
    public function show(string $slug): View
    {
        // main data
        $article = Article::with('user', 'categories')
        ->select('*')
        ->where('slug', $slug)
        ->firstOrFail($slug);

        $article->created_at = DateTime::createFromFormat('Y-m-d H:i:s', $article->created_at);

        // sidebar data
        $articles = Article::whereNot(function (Builder $query) use ($slug) {
            $query->where('slug', $slug);
        })
        ->inRandomOrder()
        ->limit($this::MAX_LIMIT)
        ->get();

        return view('guest.article.detail', compact(
            'article', 
            'articles'
        ));
    }

    /**
     * Display article page based on category.
     * 
     * @param string $name Category name of the articles.
     * 
     * @return Illuminate\View\View
     */
    public function category(string $name): View
    {
        $searchRequest = request('search');

        if (!$searchRequest) {
            $articles = Article::with('user', 'categories')
            ->whereHas('categories', function (Builder $query) use ($name) {
                $query->where('name', $name);
            })
            ->select('*')
            ->latest()
            ->limit($this::MAX_LIMIT)
            ->get();
        }

        if ($searchRequest) {
            $articles = Article::with('user', 'categories')
            ->when($searchRequest, function (Builder $query) use ($searchRequest) {
                $query->where('title', 'LIKE', '%' . $searchRequest . '%')
                ->orWhereHas('user', function (Builder $query) use ($searchRequest) {
                    $query->where('name', 'LIKE', '%' . $searchRequest . '%');
                })->orWhereHas('categories', function (Builder $query) use ($searchRequest) {
                    $query->where('name', 'LIKE', '%' . $searchRequest . '%');
                });
            })->whereHas('categories', function (Builder $query) use ($name) {
                $query->where('name', $name);
            })->select('*')
            ->latest()
            ->limit($this::MAX_LIMIT)
            ->get();
        }

        $category = Category::where('name', $name)
        ->select('name', 'meta_title', 'meta_description')
        ->firstOrFail();

        return view('guest.article.category.index', compact(
            'category', 
            'articles',
        ));
    }
}