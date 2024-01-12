<?php

use App\Enums\RoleStatus;
use App\Models\Role;

test('Try to create new role model data', function () {
    $superAdminRoleAbilities = "create, view, edit, delete";
    
    $role = new Role([
        'title' => 'super admin',
        'description' => 'Is the role in charge of holding full control over the admin page and data management of the Faisal Weekly Blog website.',
        'abilities' => 'create, view, edit, delete',
        'status' => RoleStatus::ACTIVE,
    ]);

    expect($role->title)->toBeString('super admin');
    expect($role->description)->not()->toBeEmpty();
    expect($role->abilities)->toEqual($superAdminRoleAbilities);
    expect($role->status->value)->toEqual(RoleStatus::ACTIVE);
});

test('Try to update recent role model data', function () {
    $latestRole = new Role([
        'title' => 'super admin',
        'description' => 'Is the role in charge of holding full control over the admin page and data management of the Faisal Weekly Blog website.',
        'abilities' => 'create, view, edit, delete',
        'status' => RoleStatus::ACTIVE,
    ]);

    $adminRoleAbilities = "create, view, edit, delete";

    $updatedRole = new Role([
        'title' => 'admin',
        'description' => 'is the role in charge of managing data for the Faisal Weekly Blog site, but does not have full access to the site.',
        'abilities' => 'create, view, edit, delete',
        'status' => RoleStatus::INACTIVE,
    ]);

    expect($updatedRole->title)->not()->toEqual($latestRole->title);
    expect($updatedRole->description)->not()->toBeEmpty();
    expect($updatedRole->ddescription)->not()->toEqual($latestRole->description);
    expect($updatedRole->abilities)->toEqual($adminRoleAbilities);
    expect($updatedRole->status)->not()->toEqual($latestRole->status);
});

test('Try to remove role model data', function () {
    $role = new Role([
        'title' => 'super admin',
        'description' => 'Is the role in charge of holding full control over the admin page and data management of the Faisal Weekly Blog website.',
        'abilities' => 'create, view, edit, delete',
        'status' => 'active',
    ]);

    $role->title = '';
    $role->description = '';
    $role->abilities = '';
    $role->status = RoleStatus::INACTIVE;

    expect($role->title)->toBeEmpty();
    expect($role->description)->toBeEmpty();
    expect($role->abilities)->toBeEmpty();
    expect($role->status)->not()->toEqual(RoleStatus::ACTIVE);
});
