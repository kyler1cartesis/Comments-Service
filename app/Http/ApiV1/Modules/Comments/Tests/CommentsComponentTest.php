<?php

use App\Domain\Comments\Models\Comment;
use App\Http\ApiV1\Support\Tests\ApiV1ComponentTestCase;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\deleteJson;
use function Pest\Laravel\getJson;
use function Pest\Laravel\patchJson;
use function Pest\Laravel\postJson;

uses(ApiV1ComponentTestCase::class);
uses()->group('component');

test('GET /api/v1/comments 200', function () {
    $comment = Comment::factory()->createOne();
    getJson("/api/v1/comments/?step_id={$comment->step_id}")
        ->assertStatus(200)
        ->assertJsonPath('data.0.id', $comment->id);
    
});

test('GET /api/v1/comments empty 200', function () {
    getJson("/api/v1/comments/?step_id=71b4806d-00c4-45c2-a21c-c0250b45bf5f")
        ->assertStatus(200);
});

test('POST /api/v1/comments 201', function () {
    $comment = Comment::factory()->definition();
    postJson('/api/v1/comments', $comment)
        ->assertStatus(201);
    assertDatabaseHas(Comment::class, [
        'user_id' => $comment['user_id'],
        'step_id' => $comment['step_id'],
        'text' => $comment['text'],
        'parent_id' => $comment['parent_id']
    ]);
});

test('POST /api/v1/comments 400', function () {
    $comment = Comment::factory()->definition();
    $comment['user_id'] = '1';
    postJson('/api/v1/comments', $comment)
        ->assertBadRequest();
});

test('DELETE /api/v1/comments 200', function () {
    deleteJson('/api/v1/comments?id=999')
        ->assertStatus(200);
});

// test('PATCH /api/v1/comments 201', function () {
//     patchJson('/api/v1/comments')
//         ->assertStatus(201);
// });

// test('PATCH /api/v1/comments 400', function () {
//     patchJson('/api/v1/comments')
//         ->assertStatus(400);
// });
