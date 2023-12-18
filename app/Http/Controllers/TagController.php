<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Tag;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
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
            'id', 'title', 
            'meta_title', 'slug', 
            'created_at', 'updated_at'
            )
        ->orderBy('id', 'ASC')
        ->paginate(10);
        
        return view('parts.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        /**
         * mengembalikkan view create tag
         */
        return view('parts.tag.create');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug): View
    {
        $tag = DB::table('tags')
        ->where('slug', $slug)
        ->first();
        
        return view('parts.tag.edit', compact('tag'));
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