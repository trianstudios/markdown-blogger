<?php


namespace trianstudios\Press\Console;


use Illuminate\Console\Command;
use trianstudios\Press\Facades\Press;
use trianstudios\Press\Repositories\PostsRepository;

class ProcessCommand extends Command
{
    protected $signature = "press:process";
    protected $description = "Updates blog posts.";

    public function handle(PostsRepository $postsRepository)
    {
        if (Press::configNotPublished()) {
            return $this->warn('Please publish the config file by running "php artisan vendor:publish --tag=press-config"');
        }

        try {

            $posts = Press::driver()->fetchPosts();

            $this->info("Number of Posts: " . count($posts));

            foreach ($posts as $post) {
                $postsRepository->save($post);
                $this->info("Post: {$post['title']} created / updated");
            }

        }catch (\Exception $exception){

            $this->error($exception->getMessage());

        }
    }
}