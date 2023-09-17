<?php

namespace App\Data\Casts;

use App\Data\StatusData;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class StatusCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {
        return new StatusData(!!$value);
    }
}
