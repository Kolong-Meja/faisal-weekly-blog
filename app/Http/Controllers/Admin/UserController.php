<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Interfaces\UserInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    protected UserInterface $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View | RedirectResponse
    {
        return $this->userInterface->indexView();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $createUserRequest): RedirectResponse 
    {
        return $this->userInterface->storeNewUser($createUserRequest);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request): RedirectResponse
    {
        return $this->userInterface->updateRecentUser($request);
    }

    public function edit(string $id): View | RedirectResponse
    {
        return $this->userInterface->editView($id);
    }

    public function patch(Request $request, string $id): RedirectResponse
    {
        return $this->userInterface->patchRecentUser($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        return $this->userInterface->removeOneUserById($id);
    }
}
