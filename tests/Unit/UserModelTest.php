<?php

use App\Models\User;
use Carbon\Carbon;

test('Try to create user model data', function () {
    $userData = new User([
        'role_id' => "0119b43b-cd9f-4648-b4c4-92b25f4c4ec1",
        'name' => 'John Doe',
        'username' => 'johndoe76',
        'email' => 'johndoe76@gmail.com',
        'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'password' => 'password',
        'last_login_at' => Carbon::now()->format('Y-m-d H:i:s'),
        'status' => 'offline'
    ]);

    expect($userData->role_id)->toEqual("0119b43b-cd9f-4648-b4c4-92b25f4c4ec1");
    expect($userData->name)->toBeString("John Doe");
    expect($userData->username)->toBeString("johndoe76");
    expect($userData->email)->toBeString("johndoe76@gmail.com");
    expect($userData->email_verified_at)->toBeString(Carbon::now()->format('Y-m-d H:i:s'));
    expect($userData->password)->toBeString("password");
    expect($userData->last_login_at)->toBeString(Carbon::now()->format('Y-m-d H:i:s'));
    expect($userData->status)->toBe("offline");
});
