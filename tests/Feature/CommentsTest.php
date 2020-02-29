<?php

namespace Tests\Feature;

use App\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function a_user_can_send_a_comment()
    {
        $user = factory('App\User')->create();
        $this->actingAs($user);
        $article = factory('App\Article')->create();
        $this->get($article->path())->assertStatus(200);

        $commentAttributes = [
            'content' => $this->faker->sentence
        ];

        $response = $this->post($article->path() . '/comments');
       // $comment = Comment::where($commentAttributes)->first();
        $response->assertRedirect($article->path());

        $this->assertDatabaseHas('comments', $commentAttributes);

        // TODO content is displayed
    }
}
