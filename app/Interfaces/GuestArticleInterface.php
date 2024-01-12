<?php

namespace App\Interfaces;

use Illuminate\View\View;

interface GuestArticleInterface {
    public function index(): View;

    public function show(string $slug): View;

    public function category(string $name): View;
}