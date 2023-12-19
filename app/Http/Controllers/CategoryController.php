<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Utils\CheckRole;
use App\Http\Controllers\Utils\GreetingTime;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    private const REQUIRED_ROLE = "super admin";

    private $greetingWord;

    public function __construct()
    {
        $this->greetingWord = GreetingTime::greeting();
    }
    
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
        
        $greetingMsg = $this->greetingWord;

        return view('admin.category', compact('categories', 'greetingMsg'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $greetingMsg = $this->greetingWord;

        return view('admin.create.category', compact('greetingMsg'));
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
        if (CheckRole::userRole() !== self::REQUIRED_ROLE) {
            session()->flash("error", "You don't have permission to create new admin account.");
            return redirect()->route("admin.users");
        }
        
        $category = DB::table('categories')
            ->where('slug', $slug)
            ->first();
        
        $greetingMsg = $this->greetingWord;

        return view('admin.edit.category-edit', compact('category', 'greetingMsg'));
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
        if (CheckRole::userRole() !== self::REQUIRED_ROLE) {
            session()->flash("error", "You don't have permission to create new admin account.");
            return redirect()->route("admin.users");
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