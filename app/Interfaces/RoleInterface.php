<?php

namespace App\Interfaces;

use App\Http\Requests\Role\CreateRoleRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

interface RoleInterface {
    public function indexView(): View | RedirectResponse;

    public function storeNewRole(CreateRoleRequest $createRoleRequest): RedirectResponse;

    public function updateRecentRole(Request $request): RedirectResponse;

    public function removeOneRoleById(string $id): RedirectResponse;
}