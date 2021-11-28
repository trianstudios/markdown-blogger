<?php


namespace trianstudios\Press;


class MarkdownParser
{

    public static function parse(string $string): string
    {
        return \Parsedown::instance()->text($string);
    }

}