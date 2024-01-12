<?php

namespace App\Interfaces;

use App\Http\Requests\User\CreateUserRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

interface UserInterface {
    public function indexView(): View;

    public function storeNewUser(CreateUserRequest $createUserRequest): RedirectResponse;

    public function updateRecentUser(Request $request): RedirectResponse;

    public function removeOneUserById(string $id): RedirectResponse;
}