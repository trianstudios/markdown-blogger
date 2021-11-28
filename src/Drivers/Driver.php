<?php


namespace trianstudios\Press\Drivers;

use trianstudios\Press\PressFileParser;

abstract class Driver
{
    protected array $posts = [];

    protected $config;

    public function __construct()
    {
        $this->setConfig();

        $this->validateSource();
    }

    public abstract function fetchPosts();

    protected function setConfig()
    {
        $this->config = config('press.' . config('press.driver'));
    }

    protected function validateSource(): bool
    {
        return true;
    }

    protected function parse($content, $identifier)
    {
        $this->posts[] = array_merge(
            (new PressFileParser($content))->getData(),
            ['identifier' => $identifier]
        );
    }
}