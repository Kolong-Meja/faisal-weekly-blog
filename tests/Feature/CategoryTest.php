<?php

use App\Models\Category;
use App\Models\User;

test("Try to access category table page", function () {
    $authUser = User::factory()->create();

    $response = $this->actingAs($authUser)->get("/admin/category");

    $response->assertStatus(200);

    $response->assertViewIs("admin.category");
});

test("Try to access category form create page", function () {
    $authUser = User::factory()->create();

    $response = $this->actingAs($authUser)->get("/admin/category/create");

    $response->assertStatus(200);

    $response->assertViewis("admin.create.category");
});

test('Try to create category data', function () {
    $authUser = User::factory()->create();

    $response = $this->actingAs($authUser)
    ->post("/admin/category", [
        'title' => 'Example',
        'meta_title' => 'Example',
        'slug' => 'example'
    ]);

    $response->assertStatus(302);
    
    $response->assertRedirect(route("category.index"))
    ->assertSessionHas("success", "Category successfully created!");
});

test("Try to access category form edit page", function () {
    $authUser = User::factory()->create();
    
    $authUserRole = $authUser->role->pluck("title")->first();

    $savedCategory = Category::factory()->create();

    $response = $this->actingAs($authUser)
    ->get("/admin/category/{$savedCategory->slug}/edit");

    if ($authUserRole !== "super admin") {
        $response->assertStatus(302);

        $response->assertRedirect(route("admin.users"))
        ->assertSessionHas("error", "You don't have permission to edit recent category data.");
    } else {
        $response->assertStatus(200);
        
        $response->assertViewIs("admin.edit.category-edit");
    } 
});

test('Try to update category data', function () {
    $authUser = User::factory()->create();

    $savedCategory = Category::factory()->create();

    $response = $this->actingAs($authUser)
    ->patch("/admin/category/{$savedCategory->slug}", [
        'title' => 'Example',
        'meta_title' => 'Example',
        'slug' => 'example'
    ]);

    $response->assertStatus(302);

    $response->assertRedirect(route("category.index"))
    ->assertSessionHas("success", "Category successfully updated");
});

test('Try to remove recent category data', function () {
    $authUser = User::factory()->create();

    $authUserRole = $authUser->role->pluck("title")->first();

    $savedCategory = Category::factory()->create();   

    $response = $this->actingAs($authUser)
    ->delete("/admin/category/{$savedCategory->id}");

    if ($authUserRole !== "super admin") {
        $response->assertStatus(302);
        $response->assertRedirect(route("admin.users"))
        ->assertSessionHas("error", "You don't have permission to remove category.");
    } else {
        $response->assertRedirect(route("category.index"))
        ->assertSessionHas("success", "Category successfully removed");
    }
});
