<?php


namespace trianstudios\Press\Fields;


use Carbon\Carbon;

class Date extends FieldContract
{
    public static function process($fieldType, $fieldValue, $data): array
    {
        return [
            $fieldType => Carbon::parse($fieldValue),
            'parsed_at' => Carbon::now()
        ];
    }
}