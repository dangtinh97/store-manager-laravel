<?php

namespace App\Helpers;

class ComparisonHelper
{
    public static function convert(string $string):string
    {
        $data = [
            '$eq' => '=',
            '$gt' => '>',
            '$gte' => '>=',
            '$lt' => '<',
            '$lte' => '<=',
            '$ne' => '!=',
        ];
        return $data[$string] ?? "=";
    }
}
