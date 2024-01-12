<?php

namespace App\Interfaces;

use App\Http\Requests\Category\CreateCategoryRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

interface CategoryInterface {
    public function indexView(): View;

    public function storeNewCategory(CreateCategoryRequest $createCategoryRequest): RedirectResponse;

    public function updateRecentCategory(Request $request): RedirectResponse;

    public function removeOneCategoryById(string $id): RedirectResponse;
}