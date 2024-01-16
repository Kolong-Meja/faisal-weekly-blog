<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Interfaces\CategoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    protected CategoryInterface $categoryInterface;

    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->categoryInterface = $categoryInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return $this->categoryInterface->indexView();   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCategoryRequest $createCategoryRequest): RedirectResponse
    {
        return $this->categoryInterface->storeNewCategory($createCategoryRequest);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request): RedirectResponse
    {
        return $this->categoryInterface->updateRecentCategory($request);
    }

    public function edit(string $id): View
    {
        return $this->categoryInterface->editView($id);
    }

    public function patch(Request $request, string $id): RedirectResponse
    {
        return $this->categoryInterface->patchRecentCategory($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        return $this->categoryInterface->removeOneCategoryById($id);
    }
}
