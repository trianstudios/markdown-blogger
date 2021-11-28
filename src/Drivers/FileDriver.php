<?php


namespace trianstudios\Press\Drivers;


use Illuminate\Support\Facades\File;
use trianstudios\Press\Exceptions\FileDriverDirectoryNotFoundException;

class FileDriver extends Driver
{
    public function fetchPosts(): array
    {
        $files  = File::files($this->config['path']);

        foreach ($files as $file){
            $this->parse($file->getPathname(), $file->getFilename());
        }

        return $this->posts;
    }

    /**
     * @throws FileDriverDirectoryNotFoundException
     */
    protected function validateSource(): bool
    {
        if(!File::exists($this->config['path'])){
            throw new FileDriverDirectoryNotFoundException(
                "Directory at " . $this->config['path'] . " does not exist. ".
                "Check the directory path in the config file."
            );
        }

        return true;
    }
}