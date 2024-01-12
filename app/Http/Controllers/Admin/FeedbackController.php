<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FeedbackController extends Controller
{
    protected const MAX_PAGINATE = 10;
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $searchRequest = request('search');

        if (!$searchRequest) {
            $feedbacks = Feedback::select('*')->paginate($this::MAX_PAGINATE);
        }

        if ($searchRequest) {
            $feedbacks = Feedback::select('*')->when($searchRequest, function (Builder $query) use ($searchRequest) {
                $query->where('id', 'ILIKE', '%' . $searchRequest . '%')
                ->orWhere('name', 'ILIKE', '%' . $searchRequest . '%')
                ->orWhere('email', 'ILIKE', '%' . $searchRequest . '%');
            })->paginate($this::MAX_PAGINATE);
        }

        return view('admin.feedback.index', compact('feedbacks'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $feedback = Feedback::findOrFail($id);

        $feedback->delete();

        session()->flash('success', 'Feedback has been successfully removed!');

        return redirect();
    }
}
