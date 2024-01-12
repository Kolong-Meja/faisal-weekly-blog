<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Interfaces\GuestArticleInterface;
use Illuminate\View\View;

class ArticleController extends Controller
{
    protected GuestArticleInterface $guestArticleInterface;

    public function __construct(GuestArticleInterface $guestArticleInterface)
    {
        $this->guestArticleInterface = $guestArticleInterface;   
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return $this->guestArticleInterface->index();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug): View
    {
        return $this->guestArticleInterface->show($slug);
    }

    /**
     * Display the category view page.
     */
    public function category(string $name): View
    {
        return $this->guestArticleInterface->category($name);
    }
}
