<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LikesTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    public function testAUserCanLikeAPost()
    {
        // given we have a post
        $post = factory('App\Post')->create();

        // and a logged user
        $user = factory('App\User')->create();
        $this->actingAs($user);

        // when the user like a post
        $post->like();

        // then we should see evidence in the database, and the post should be liked
        $this->assertDatabaseHas('likes',[
            'user_id' => $user->id,
            'likeable_id' => $post->id,
            'likeable_type' => get_class($post),
        ]);
    }
}
