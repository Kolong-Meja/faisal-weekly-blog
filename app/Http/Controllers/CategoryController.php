<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

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
        
        return view('parts.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('parts.category.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug): View
    {
        $category = DB::table('categories')
            ->where('slug', $slug)
            ->first();
        
        return view('parts.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        CategoryRequest $request, 
        string $slug
        ): RedirectResponse
    {
        $validated = $request->validated();
        
        $category = Category::where('slug', $slug)->first();
        
        $category->update($request->all());
        
        session()->flash('success', 'Category successfully updated');
        return redirect('/admin/category')->with(compact('category'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
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