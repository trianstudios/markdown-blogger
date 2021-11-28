<?php


namespace trianstudios\Press\Repositories;


use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use trianstudios\Press\Models\Post;

class PostsRepository
{
    public function save($post)
    {
        Post::updateOrCreate([
            'identifier' => $post['identifier'],
        ], [
            'identifier' => $post['identifier'],
            'slug' => Str::slug($post['title']),
            'title' => $post['title'],
            'body' => $post['body'],
            'extra' => $this->extra($post),
        ]);
    }

    private function extra($post)
    {
        $extra = json_decode($post['extra'] ?? '[]');
        $attributes = Arr::except($post, ['title', 'body', 'identifier', 'extra']);

        return json_encode(array_merge((array)$extra, $attributes));
    }
}