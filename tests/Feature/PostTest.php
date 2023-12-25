<?php

use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

test('Try to access post table page', function () {
    $authUser = User::factory()->create();

    $response = $this->actingAs($authUser)->get("/admin/post");

    $response->assertStatus(200);

    $response->assertViewIs("admin.post");
});

test("Try to access post form create page", function () {
    $authUser = User::factory()->create();

    $countSavedCategory = Category::factory()->create()->count();

    $countSavedTag = Tag::factory()->create()->count();

    $response = $this->actingAs($authUser)->get("/admin/post/create");

    if (($countSavedCategory < 1 && $countSavedTag < 1) || 
        ($countSavedCategory < 1 || $countSavedTag < 1)) {
        $response->assertStatus(302);
        
        $response->assertRedirect(route("post.index"))
        ->assertSessionHas("error", "You cannot create post with empty tag and category");
    } else {
        $response->assertStatus(200);
        
        $response->assertViewIs("admin.create.post");
    }
});

test("Try to create post data", function () {
    $authUser = User::factory()->create();

    $image = Image::factory()->create();

    $category = Category::factory()->create();

    $tag = Tag::factory()->create();

    $response = $this->actingAs($authUser)
    ->post("/admin/post", [
        "user_id" => $authUser->id,
        "title" => "Lorem ipsum dolor sit amet, 
                    consectetur adipiscing elit. Nullam vitae fringilla ipsum,
                    sed facilisis nunc.",
        "description" => "Lorem ipsum dolor sit amet, 
                          consectetur adipiscing elit. 
                          Nullam ante est, porta ut metus non, 
                          vehicula pulvinar arcu.",
        "meta_title" => "Lorem ipsum dolor sit amet, 
                        consectetur adipiscing elit. 
                        Curabitur nec arcu massa. 
                        Sed a turpis ut sapien mattis tincidunt fringilla.",
        "slug" => "Lorem ipsum dolor sit amet, 
                   consectetur adipiscing elit. 
                   Aenean vel dapibus nisi. 
                   Aliquam sodales ut.",
        "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ultrices tincidunt vestibulum. Maecenas consequat tempus malesuada. Donec rutrum orci non dignissim ullamcorper. Nam feugiat mi lectus, eget tincidunt augue hendrerit vitae. Sed nec porttitor eros. Mauris vestibulum, lacus ut convallis tincidunt, erat sem finibus turpis, in maximus est est non dolor. Mauris bibendum cursus lorem in tempor. Quisque maximus vehicula magna et commodo. Duis tempus in dolor ut viverra. Ut vel ligula eros. Quisque gravida, ante vel congue fermentum, lacus nunc rhoncus eros, id vehicula felis ante a sem. Duis nec mauris suscipit, suscipit massa et, ultricies nibh. Nunc ut placerat sem. Donec id leo vel velit auctor mollis.
                      In euismod sit amet enim eget condimentum. Fusce quis tempor mauris. Aenean a dapibus mi. Fusce malesuada leo vitae purus faucibus tincidunt in vitae augue. Sed in tempus augue. Sed augue turpis, lacinia ut nisi eget, rutrum venenatis enim. Sed maximus enim sed diam tincidunt, nec lacinia metus egestas. Aenean vel porta felis. Vestibulum ultricies libero elementum sapien vehicula eleifend. Nam sollicitudin lobortis aliquet. Nullam vel dapibus enim. Suspendisse finibus tortor nulla, non tincidunt libero elementum placerat. Nullam placerat vehicula ex scelerisque laoreet. Aliquam malesuada venenatis leo, a fringilla sem pharetra sed. Integer euismod tellus velit, et volutpat quam suscipit a. Proin fringilla porta magna, in vulputate turpis fringilla nec.",
        "keywords" => "Lorem ipsum dolor sit amet, 
                       consectetur adipiscing elit. 
                       Mauris et feugiat mi. 
                       Pellentesque a quam.",
        "image" => $image->image,
        "owner" => $image->owner,
        "url" => $image->url,
        "tags" => $tag->id,
        "categories" => $category->id
    ]);

    $response->assertStatus(302);

    $response->assertRedirect(route("post.index"))
    ->assertSessionHas("success", "Post successfully created");
});

test("Try to access post detail page", function () {
    $authUser = User::factory()->create();

    $savedPost = Post::factory()->create();

    $savedImage = Image::factory()->create();

    $savedPost->images()->attach($savedImage->id);

    $response = $this->actingAs($authUser)->get("/admin/post/{$savedPost->slug}");

    $response->assertStatus(200);

    $response->assertViewIs("admin.detail.post");
});

test("Try to access post form edit page", function () {
    $authUser = User::factory()->create();

    $authUserRole = $authUser->role->pluck("title")->first();

    $savedPost = Post::factory()->create();

    $response = $this->actingAs($authUser)
    ->get("/admin/post/{$savedPost->slug}/edit");

    if ($authUserRole !== "super admin") {
        $response->assertStatus(302);

        $response->assertRedirect(route("admin.users"))
        ->assertSessionHas("error", "You don't have permission to edit recent post data.");
    } else {
        $response->assertStatus(200);

        $response->assertViewIs("admin.edit.post-edit");
    }
});

test("Try to update post data", function () {
    $authUser = User::factory()->create();

    $image = Image::factory()->create();

    $category = Category::factory()->create();

    $tag = Tag::factory()->create();

    $savedPost = Post::factory()->create();

    $response = $this->actingAs($authUser)
    ->patch("/admin/post/{$savedPost->slug}", [
        "user_id" => $authUser->id,
        "title" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi suscipit leo id nisl fringilla tincidunt.",
        "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi suscipit leo id nisl fringilla tincidunt.",
        "meta_title" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi suscipit leo id nisl fringilla tincidunt.",
        "slug" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi suscipit leo id nisl fringilla tincidunt.",
        "content" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi suscipit leo id nisl fringilla tincidunt.",
        "keywords" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi suscipit leo id nisl fringilla tincidunt.",
        "image" => $image->image,
        "owner" => $image->owner,
        "url" => $image->url,
        "tags" => $tag->id,
        "categories" => $category->id,
    ]);
    
    $response->assertStatus(302);

    $response->assertRedirect(route("post.index"))
    ->assertSessionHas("success", "Post successfully updated");
});

test("Try to remove post data", function () {
    $authUser = User::factory()->create();

    $authUserRole = $authUser->role->pluck("title")->first();

    $savedPost = Post::factory()->create();

    $response = $this->actingAs($authUser)->delete("/admin/post/{$savedPost->id}");

    if ($authUserRole !== "super admin") {
        $response->assertStatus(302);

        $response->assertRedirect(route("admin.users"))
        ->assertSessionHas("error", "You don't have permission to remove post.");
    } else {
        $response->assertStatus(302);
        
        $response->assertRedirect(route("post.index"))
        ->assertSessionHas("success", "Post successfully removed");
    }
});