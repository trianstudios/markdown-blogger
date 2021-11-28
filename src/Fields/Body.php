<?php


namespace trianstudios\Press\Fields;


use trianstudios\Press\MarkdownParser;

class Body extends FieldContract
{
    public static function process($fieldType, $fieldValue, $data): array
    {
        return [$fieldType => MarkdownParser::parse($fieldValue)];
    }
}