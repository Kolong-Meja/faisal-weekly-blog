<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Utils\CheckRole;
use App\Http\Controllers\Utils\GreetingTime;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TagRequest;
use App\Models\Tag;

class TagController extends Controller
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
        /**
         * mengembalikkan view index tag 
         */
        $tags = DB::table('tags')
        ->select(
            'id', 'title', 'meta_title', 
            'slug', 'updated_at'
        )
        ->orderBy('id', 'ASC')
        ->paginate(10);
        
        $greetingMsg = $this->greetingWord;

        return view('admin.tag', compact('tags', 'greetingMsg'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        /**
         * mengembalikkan view create tag
         */
        $greetingMsg = $this->greetingWord;

        return view('admin.create.tag', compact('greetingMsg'));
    }

    /**
     * Store the data.
     */
    public function store(TagRequest $request): RedirectResponse
    {
        $request->validated();

        Tag::create([
            'title' => '#'.$request->input('title'),
            'meta_title' => $request->input('meta_title'),
            'slug' => $request->input('slug'),
        ]);

        session()->flash("success", "Tag successfully created!");
        return redirect()->route('tag.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug): View | RedirectResponse
    {
        if (CheckRole::userRole() !== self::REQUIRED_ROLE) {
            session()->flash("error", "You don't have permission to edit recent tag data.");
            return redirect()->route("admin.users");
        }

        $tag = DB::table('tags')
        ->where('slug', $slug)
        ->first();
        
        $greetingMsg = $this->greetingWord;

        return view('admin.edit.tag-edit', compact('tag', 'greetingMsg'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        TagRequest $request, 
        string $slug
        ): RedirectResponse
    {
        $request->validated();
        
        $tag = Tag::where('slug', $slug)->first();
        
        $tag->update($request->all());
        
        session()->flash('success', 'Tag successfully updated');
        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    { 
        if (CheckRole::userRole() !== self::REQUIRED_ROLE) {
            session()->flash("error", "You don't have permission to remove tag.");
            return redirect()->route("admin.users");
        }

        $tag = Tag::findOrFail($id);
        
        if (!$tag) {
            abort(404, 'Tag not found!');
        }
        
        $tag->delete();
        
        session()->flash('success', 'Tag successfully removed');
        return redirect()->route('tag.index');
    }
}

?>