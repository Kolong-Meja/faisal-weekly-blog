<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;
use DateTime;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $articles = DB::table('articles')
        ->select('*')
        ->orderBy('created_at', 'DESC')
        ->limit(5)
        ->get();

        foreach($articles as $article) {
            // custom format created_at
            $article->created_at = DateTime::createFromFormat('Y-m-d H:i:s', $article->created_at); 

            // calculate time read of article
            $readDuration = ceil(str_word_count(strip_tags($article->content)) / 300);
            
            $article->readDuration = $readDuration;
        }
        
        return view('home', compact('articles'));
    }

    public function about(): View
    {
        return view('guest.about');
    }

    public function feedback(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        Feedback::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'content' => $validatedData['content']
        ]);

        return redirect()
            ->back()
            ->with(
                'success', 
                'Thank you for submitting a feedback. I will follow your suggestion and reply back to your email asap. If you want to direct contacting me, please send an email to faisalramadhan1299@gmail.com'
        );
    }
}

