<?php

use App\Models\Tag;
use App\Models\User;

test("Try to access tag table page", function () {
    $authUser = User::factory()->create();

    $response = $this->actingAs($authUser)->get("/admin/tag");

    $response->assertStatus(200);
    
    $response->assertViewIs("admin.tag");
});

test('Try to access tag form create page', function () {
    $authUser = User::factory()->create();

    $response = $this->actingAs($authUser)->get("/admin/tag/create");

    $response->assertStatus(200);
});

test("Try to create new tag data", function () {
    $authUser = User::factory()->create();

    $response = $this->actingAs($authUser)->post("/admin/tag", [
        'title' => 'Testing',
        'meta_title' => 'Testing',
        'slug' => 'testing'
    ]);

    $response->assertStatus(302);

    $response->assertRedirect(route("tag.index"))
    ->assertSessionHas("success", "Tag successfully created!");
});

test("Try to access tag form edit page", function () {
    $authUser = User::factory()->create();

    $authUserRole = $authUser->role->pluck("title")->first();

    $savedTag = Tag::factory()->create();

    $response = $this->actingAs($authUser)->get("/admin/tag/{$savedTag->slug}/edit");

    if ($authUserRole !== "super admin") {
        $response->assertStatus(302);

        $response->assertRedirect(route("admin.users"))
        ->assertSessionHas("error", "You don't have permission to edit recent tag data.");
    } else {
        $response->assertViewIs("admin.edit.tag-edit");
    }
});

test("Try to update tag data", function () {
    $authUser = User::factory()->create();

    $savedTag = Tag::factory()->create();

    $response = $this->actingAs($authUser)
    ->patch("/admin/tag/{$savedTag->slug}", [
        'title' => 'Testing',
        'meta_title' => 'Testing',
        'slug' => 'testing'
    ]);

    $response->assertStatus(302);

    $response->assertRedirect(route("tag.index"))
    ->assertSessionHas("success", "Tag successfully updated");
});

test("Try to remove tag data", function () {
    $authUser = User::factory()->create();

    $authUserRole = $authUser->role->pluck("title")->first();

    $savedTag = Tag::factory()->create();

    $response = $this->actingAs($authUser)
    ->delete("/admin/tag/{$savedTag->id}");

    if ($authUserRole !== "super admin") {
        $response->assertStatus(302);
        $response->assertRedirect(route("admin.users"))
        ->assertSessionHas("error", "You don't have permission to remove tag.");
    } else {
        $response->assertRedirect(route("tag.index"))
        ->assertSessionHas("success", "Tag successfully removed");
    }
});
