<?php

namespace App\Data\Casts;

use App\Data\DateTimeData;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class DateTimeCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {
        return new DateTimeData($value);
    }
}
