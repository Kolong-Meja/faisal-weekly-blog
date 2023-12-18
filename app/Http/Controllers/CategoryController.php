<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = DB::table('categories')
        ->select(
            'id', 'title', 
            'meta_title', 'slug', 
            'created_at', 'updated_at'
            )
        ->orderBy('id', 'ASC')
        ->paginate(10);
        
        return view('admin.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.create.category');
    }

    /**
     * Store the data.
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        $request->validated();

        Category::create([
            'title' => $request->input('title'),
            'meta_title' => $request->input('meta_title'),
            'slug' => $request->input('slug'),
        ]);

        session()->flash("success", "Category successfully created!");
        return redirect()->route('category.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug): View
    {
        $category = DB::table('categories')
            ->where('slug', $slug)
            ->first();
        
        return view('admin.edit.category-edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        CategoryRequest $request, 
        string $slug
        ): RedirectResponse
    {
        $request->validated();
        
        $category = Category::where('slug', $slug)->first();
        
        $category->update($request->all());
        
        session()->flash('success', 'Category successfully updated');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {   
        $authUserRole = optional(Auth::user())->role;

        if ($authUserRole !== "super admin") {
            session()->flash("error", "You don't have permission to remove category data.");
            return redirect()->route("category.index");
        }

        $category = Category::findOrFail($id);
        
        if (!$category) {
            abort(404, 'Category not found!');
        }
        
        $category->delete();
        
        session()->flash('success', 'Category successfully removed');
        return redirect()->route('category.index');
    }
}

?>