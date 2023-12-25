<?php

use App\Models\User;

test('Try to access login page', function () {
    $this->assertGuest();
    
    $response = $this->get('/login');

    $response->assertStatus(200);
    
    $response->assertViewIs("auth.login");
});

test('Redirect user when authencaticated', function () {
    $authUser = User::factory()->create();

    $response = $this->actingAs($authUser)->get("/login");

    $response->assertRedirect("/admin/dashboard");
});

test('Try to access admin page', function () {
    $authUser = User::factory()->create();

    $response = $this->post("/login", [
        'username' => $authUser->username,
        'password' => 'password'
    ]);

    $response->assertRedirect('/admin/dashboard');
    
    $this->assertAuthenticatedAs($authUser);
});

test('Try to logout and redirect to home page', function () {
    $authUser = User::factory()->create();

    $response = $this->actingAs($authUser)->post("/logout");

    $response->assertRedirect("/");

    $this->assertGuest();
});


