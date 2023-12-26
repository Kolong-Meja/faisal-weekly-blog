<?php

test('Try to send a feedback from user perspective', function () {
    $response = $this->assertGuest()->post("/feedback", [
        "name" => "John Doe",
        "email" => "johndoe76@gmail.com",
        "content" => "Hello World!",
    ]);

    $response->assertJson([
        'success' => true,
        'status' => 201,
        'message' => 'Feedback successfully send!',
    ]);
});
