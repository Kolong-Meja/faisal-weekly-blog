<?php

namespace App\Repositories;

use App\Http\Requests\Article\CreateArticleRequest;
use App\Interfaces\ArticleInterface;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Str;


class ArticleRepository implements ArticleInterface {
    protected const MAX_PAGINATE = 10;
    
    public function indexView(): View
    {
        $searchRequest = request('search');

        if (!$searchRequest) {
            $articles = Article::with('user', 'categories')
            ->paginate($this::MAX_PAGINATE);
        }
        
        if ($searchRequest) {
            $articles = Article::with('user', 'categories')
            ->when($searchRequest, function(Builder $query) use ($searchRequest) {
                $query->where('id', 'ILIKE', '%' . $searchRequest . '%')
                ->orWhere('title', 'ILIKE', '%' . $searchRequest . '%')
                ->orWhere('status', 'ILIKE', '%' . $searchRequest . '%')
                ->orWhereHas('categories', function (Builder $query) use ($searchRequest) {
                    $query->where('name', 'ILIKE', '%' . $searchRequest . '%');
                });
            })->paginate($this::MAX_PAGINATE);

            if ($articles->isEmpty()) {
                session()->flash( 
                    'not found', 
                    "Article with ID, title or status like {$searchRequest} was not found."
                );
            }
        }

        $categories = Category::where('status', 'active')->get();

        return view('admin.article.index', [
            'articles' => $articles,
            'categories' => $categories,
        ]);
    }

    public function storeNewArticle(CreateArticleRequest $createArticleRequest): RedirectResponse
    {
        $authUserId = Auth::check() ? Auth::user()->id : '';
        
        $validatedData = $createArticleRequest->validated();

        $article = Article::create([
            'user_id' => $authUserId,
            'title' => $validatedData['title'],
            'meta_title' => $validatedData['meta_title'],
            'slug' => $validatedData['slug'],
            'description' => $validatedData['description'],
            'meta_description' => $validatedData['meta_description'],
            'content' => $validatedData['content'],
            'status' => $validatedData['status'],
        ]);

        if (!empty(request('categories'))) {
            $article->categories()->attach(request('categories'));
        }
        
        session()->flash('success', 'Article has been successfully created!');

        return redirect()->route('article.index');
    }

    public function updateRecentArticle(Request $request): RedirectResponse
    {
        $authUserId = Auth::check() ? Auth::user()->id : '';

        $validatedData = $request->validate([
            'id' => ['required', 'exists:articles,id'],
            'title' => ['required', 'string', 'max:150'],
            'meta_title' => ['required', 'string', 'max:150'],
            'slug' => ['required', 'string', 'max:150'],
            'description' => ['required', 'string'],
            'meta_description' => ['required', 'string'],
            'content' => ['required', 'string'],
            'status' => ['required', 'string'],
        ]);

        $articleData = Article::findOrFail($validatedData['id']);

        $articleData->update([
            'user_id' => $authUserId,
            'title' => $validatedData['title'],
            'meta_title' => $validatedData['meta_title'],
            'slug' => Str::slug($validatedData['slug']),
            'description' => $validatedData['description'],
            'meta_description' => $validatedData['meta_description'],
            'content' => $validatedData['content'],
            'status' => $validatedData['status'],
        ]);

        if (!is_null($articleData->categories())) {
            $articleData->categories()->syncWithoutDetaching($request->input('categories'));
        } else {
            $articleData->categories()->attach($request->input('categories'));
        }

        session()->flash('success', 'Article has been successfully updated!');

        return redirect()->route('article.index');
    }

    public function removeOneArticleById(string $id): RedirectResponse
    {
        $articleData = Article::findOrFail($id);

        $articleData->delete();

        session()->flash('success', 'Article has been successfully removed!');

        return redirect()->route('article.index');
    }
}