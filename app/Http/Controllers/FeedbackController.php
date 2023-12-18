<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        /**
         * mengembalikkan view index feedback
         */
        $feedbacks = DB::table('feedback')
        ->select(
            'id', 'name', 
            'email', 'content', 
            'created_at', 'updated_at'
            )
        ->orderBy('id', 'ASC')
        ->paginate(10);
        
        return view('admin.feedback', compact('feedbacks'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $feedback = Feedback::findOrFail($id);
        
        $feedback->delete();
        
        session()->flash('success', 'Feedback successfully removed');
        return redirect()->route('feedback.index');
    }
}

?>