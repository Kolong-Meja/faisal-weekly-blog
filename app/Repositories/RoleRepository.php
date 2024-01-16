<?php

namespace App\Repositories;

use App\Enums\RoleStatus;
use App\Http\Requests\Role\CreateRoleRequest;
use App\Interfaces\RoleInterface;
use App\Models\Role;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class RoleRepository implements RoleInterface {
    protected const MAX_PAGINATE = 10;

    /**
     * Display role table.
     * 
     * @return Illuminate\Http\RedirectResponse
     */
    public function indexView(): View | RedirectResponse
    {
        $searchRequest = request('search');

        if (!$searchRequest) {
            $roles = DB::table('roles')
            ->select(
                'id', 
                'title', 
                'description', 
                'abilities',
                'status', 
                'updated_at'
            )->paginate($this::MAX_PAGINATE);
        }

        if ($searchRequest) {
            $roles = DB::table('roles')
            ->select('*')
            ->when($searchRequest, function (QueryBuilder $query) use ($searchRequest) {
                $query->where('id', 'LIKE', '%' . $searchRequest . '%')
                ->orWhere('title', 'LIKE', '%' . $searchRequest . '%')
                ->orWhere('status', 'LIKE', '%' . $searchRequest . '%');
            })->paginate($this::MAX_PAGINATE);

            if ($roles->isEmpty()) {
                session()->flash( 
                    'not found', 
                    "Role with ID, title or status like {$searchRequest} was not found."
                );
            }
        }

        return view('admin.role.index', compact('roles'));
    }

    /**
     * Store new role model data.
     * 
     * @param App\Http\Requests\Role\CreateRoleRequest $createRoleRequest Request role data.
     * 
     * @return Illuminate\Http\RedirectResponse
     */
    public function storeNewRole(CreateRoleRequest $createRoleRequest): RedirectResponse
    {
        $validatedData = $createRoleRequest->validated();

        $abilitiesData = $createRoleRequest->has('abilities') ? $createRoleRequest->input('abilities') : [];
    
        $abilities = implode(", ", $abilitiesData);

        Role::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'abilities' => $abilities,
            'status' => RoleStatus::ACTIVE,
        ]);

        session()->flash('success', 'Role has been successfully created!');

        return redirect()->route('role.index');
    }

    /**
     * Store new update of role model data.
     * 
     * @param Illuminate\Http\Request $request Request role model data.
     * 
     * @return Illuminate\Http\RedirectResponse
     */
    public function updateRecentRole(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'id' => ['required', 'exists:roles,id'],
            'title' => ['required', 'string', 'max:50', 'unique'],
            'description' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string'],
        ]);

        $roleData = Role::findOrFail($validatedData['id']);

        $abilitiesData = $request->has('abilities') ? $request->input('abilities') : [];
    
        $abilities = implode(", ", $abilitiesData);
        
        $roleData->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'abilities' => $abilities,
            'status' => $validatedData['status'],
        ]);

        session()->flash('success', 'Role has been successfully updated!');

        return redirect()->route('role.index');
    }

    /**
     * Display edit role view.
     * 
     * @param string $id Role id.
     * 
     * @return Illuminate\View\View|Illuminate\Http\RedirectResponse
     */
    public function editView(string $id): View|RedirectResponse
    {
        $role = Role::findOrFail($id);

        return view('admin.role.edit', compact('role'));
    }

    /**
     * Store new patch update of role model data.
     * 
     * @param Illuminate\Http\Request $request Request role model data.
     * @param string $id Role id.
     * 
     * @return Illuminate\Http\RedirectResponse
     */
    public function patchRecentRole(Request $request, string $id): RedirectResponse
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:50', 'unique'],
            'description' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string'],
        ]);

        $roleData = Role::findOrFail($id);

        $abilitiesData = $request->has('abilities') ? $request->input('abilities') : [];
    
        $abilities = implode(", ", $abilitiesData);

        $roleData->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'abilities' => $abilities,
            'status' => $validatedData['status'],
        ]);
        
        session()->flash('success', 'Role has been successfully updated!');

        return redirect()->route('role.index');
    }

    /**
     * Remove existing role model data.
     * 
     * @param string $id Role id.
     * 
     * @return Illuminate\Http\RedirectResponse
     */
    public function removeOneRoleById(string $id): RedirectResponse
    {
        $roleData = Role::findOrFail($id);

        $roleData->delete();

        session()->flash('success', 'Role has been successfully removed!');

        return redirect()->route('role.index');
    }
}