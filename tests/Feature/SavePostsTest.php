<?php


namespace trianstudios\Press\Tests\Feature;


use trianstudios\Press\Models\Post;
use trianstudios\Press\Tests\TestCase;

class SavePostsTest extends TestCase
{
    /** @test */
    public function a_post_can_be_created_with_a_factory()
    {
        $post = Post::factory()->create();

        $this->assertCount(1, Post::all());
    }
}