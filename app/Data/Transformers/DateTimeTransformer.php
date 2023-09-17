<?php

namespace App\Data\Transformers;

use App\Data\DateTimeData;
use Spatie\LaravelData\Support\DataProperty;
use Spatie\LaravelData\Transformers\Transformer;

class DateTimeTransformer implements Transformer
{
    public function transform(DataProperty $property, mixed $value): mixed
    {
        return new DateTimeData($value);
    }
}
