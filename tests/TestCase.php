<?php


namespace trianstudios\Press\Tests;


use Illuminate\Foundation\Testing\RefreshDatabase;
use trianstudios\Press\PressBaseServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{

    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withFactories(__DIR__ . '/../database/factories');
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     * @return string[]
     */
    protected function getPackageProviders($app): array
    {
        return [
            PressBaseServiceProvider::class
        ];
    }

}