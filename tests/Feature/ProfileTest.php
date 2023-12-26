<?php

use App\Models\User;

test('Try to access profile page', function () {
    $authUser = User::factory()->create();

    $response = $this->actingAs($authUser)->get("/admin/profile");

    $response->assertStatus(200);

    $response->assertViewIs('profile.edit');
});

test("Try to edit profile data", function () {
    $authUser = User::factory()->create();

    $response = $this->actingAs($authUser)
    ->patch("/admin/profile", [
        "username" => "johndoe76",
        "email" => "johndoe76@gmail.com"
    ]);

    $response->assertStatus(302);

    $response->assertRedirect(route('profile.edit'))
    ->assertSessionHas("status", "profile-updated");
});

test("Try to update current password", function () {
    $authUser = User::factory()->create();

    $response = $this->actingAs($authUser)
    ->put("password", [
        'current_password' => 'password',
        'password' => 'My Password',
        'password_confirmation' => 'My Password'
    ]);

    $response->assertStatus(302);

    $response->assertRedirect(session()->previousUrl())
    ->assertSessionHas("status", "password-updated");
});

test("Try to remove account", function () {
    $authUser = User::factory()->create();

    $response = $this->actingAs($authUser)
    ->delete("/admin/profile", [
        'current-password' => 'password'
    ]);

    $response->assertStatus(302);

    $response->assertRedirect(route('home.index'));
});
