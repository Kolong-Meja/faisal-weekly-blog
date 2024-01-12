<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\CreateArticleRequest;
use App\Interfaces\ArticleInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    protected ArticleInterface $articleInterface;

    public function __construct(ArticleInterface $articleInterface)
    {
        $this->articleInterface = $articleInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return $this->articleInterface->indexView();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateArticleRequest $createArticleRequest): RedirectResponse
    {
        return $this->articleInterface->storeNewArticle($createArticleRequest);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request): RedirectResponse
    {
        return $this->articleInterface->updateRecentArticle($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        return $this->articleInterface->removeOneArticleById($id);
    }
}
