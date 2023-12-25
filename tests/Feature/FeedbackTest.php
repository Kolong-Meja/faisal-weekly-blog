<?php

use App\Models\Feedback;
use App\Models\User;

test('Try to access feedback table page', function () {
    $authUser = User::factory()->create();
    
    $response = $this->actingAs($authUser)->get("/admin/feedback");

    $response->assertStatus(200);

    $response->assertViewIs("admin.feedback");
});

test("Try to remove feedback data", function () {
    $authUser = User::factory()->create();

    $savedFeedback = Feedback::factory()->create();

    $response = $this->actingAs($authUser)
    ->delete("/admin/feedback/{$savedFeedback->id}");

    $response->assertRedirect(route("feedback.index"))
    ->assertSessionHas("success", "Feedback successfully removed");
});
