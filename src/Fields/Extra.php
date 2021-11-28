<?php


namespace trianstudios\Press\Fields;


class Extra extends FieldContract
{

    public static function process($fieldType, $fieldValue, $data): array
    {
        $extra = isset($data['extra']) ? (array)json_decode($data['extra']) : [];

        return [
            'extra' => json_encode(
                array_merge(
                    $extra,
                    [
                        $fieldType => $fieldValue
                    ]
                )
            )
        ];
    }
}