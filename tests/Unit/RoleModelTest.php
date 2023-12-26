<?php
use App\Models\Role;

test('Try to create role model data', function () {
    $roleData = new Role([
        'title' => 'super admin',
        'abilities' => '[create, view, edit, delete]'
    ]);

    expect($roleData->title)->toBeString("super admin");
    expect($roleData->abilities)->toBeString("[create, view, edit, delete]");
});

test("Try to update role model data", function () {
    $earlyRoleData = new Role([
        'title' => 'super admin',
        'abilities' => '[create, view, edit, delete]'
    ]);

    expect($earlyRoleData->title)->toBeString("super admin");
    expect($earlyRoleData->abilities)->toBeString("[create, view, edit, delete]");

    $currentRoleData = new Role([
        'title' => 'admin',
        'abilities' => '[create, view]',
    ]);

    expect($currentRoleData->title)->not->toEqual($earlyRoleData->title);
    expect($currentRoleData->abilities)->not->toEqual($earlyRoleData->abilities);
});

test("Try to remove role model data", function () {
    $roleData = new Role([
        'title' => 'super admin',
        'abilities' => '[create, view, edit, delete]'
    ]);

    $roleData->title = "";
    $roleData->abilities = "";

    expect($roleData->title)->toBeEmpty();
    expect($roleData->abilities)->toBeEmpty();
});