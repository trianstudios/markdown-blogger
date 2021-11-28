<?php


namespace trianstudios\Press\Tests\Feature;


use Parsedown;
use trianstudios\Press\MarkdownParser;
use trianstudios\Press\Tests\TestCase;

class MarkdownTest extends TestCase
{
    /** @test */
    public function simple_markdown_is_parsed()
    {
        $this->assertEquals('<h1>Heading</h1>', MarkdownParser::parse("# Heading"));
    }
}