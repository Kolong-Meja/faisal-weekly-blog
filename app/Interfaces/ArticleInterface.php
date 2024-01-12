<?php

namespace App\Interfaces;

use App\Http\Requests\Article\CreateArticleRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

interface ArticleInterface {
    public function indexView(): View;

    public function storeNewArticle(CreateArticleRequest $createArticleRequest): RedirectResponse;

    public function updateRecentArticle(Request $request): RedirectResponse;
    
    public function removeOneArticleById(string $id): RedirectResponse;
}