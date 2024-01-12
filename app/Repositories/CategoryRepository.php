<?php

namespace App\Repositories;

use App\Enums\CategoryStatus;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Interfaces\CategoryInterface;
use App\Models\Category;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CategoryRepository implements CategoryInterface {

    protected const MAX_PAGINATE = 10;
    
    public function indexView(): View
    {
        $searchRequest = request('search');

        if (!$searchRequest) {
            $categories = DB::table('categories')
            ->select('*')
            ->paginate($this::MAX_PAGINATE);
        }

        if ($searchRequest) {
            $categories = DB::table('categories')
            ->select('*')
            ->when($searchRequest, function (Builder $query) use ($searchRequest) {
                $query->where('id', 'ILIKE', '%' . $searchRequest . '%')
                ->orWhere('name', 'ILIKE', '%' . $searchRequest . '%')
                ->orWhere('status', 'ILIKE', '%' . $searchRequest . '%');
            })->paginate($this::MAX_PAGINATE);
            
            if ($categories->isEmpty()) {
                session()->flash('not found', "Category with ID, name or status like {$searchRequest} was not found.");
            }
        }
        
        return view('admin.category.index', compact('categories'));
    }

    public function storeNewCategory(CreateCategoryRequest $createCategoryRequest): RedirectResponse
    {
        $validatedData = $createCategoryRequest->validated();

        Category::create([
            'name' => $validatedData['name'],
            'meta_title' => $validatedData['meta_title'],
            'description' => $validatedData['description'],
            'meta_description' => $validatedData['meta_description'],
            'status' => CategoryStatus::ACTIVE,
        ]);

        session()->flash('success', 'Category has been successfully created!');

        return redirect()->route('category.index');
    }

    public function updateRecentCategory(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:50'],
            'meta_title' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string'],
            'meta_description' => ['required', 'string'],
            'status' => ['required', 'string'],
        ]);

        $categoryData = Category::findOrFail($validatedData['id']);

        $categoryData->update([
            'name' => $validatedData['name'],
            'meta_title' => $validatedData['meta_title'],
            'description' => $validatedData['description'],
            'meta_description' => $validatedData['meta_description'],
            'status' => $validatedData['status'],
        ]);

        session()->flash('success', 'Category has been successfully update!');

        return redirect()->route('category.index');
    }

    public function removeOneCategoryById(string $id): RedirectResponse
    {
        $categoryData = Category::findOrFail($id);

        $categoryData->delete();

        session()->flash('success', 'Category has been successfully removed!');

        return redirect();
    }
}