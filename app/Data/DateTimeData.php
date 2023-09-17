<?php

namespace App\Data;

use App\Data\Transformers\DateTimeTransformer;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\Computed;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript, WithTransformer(DateTimeTransformer::class)]
class DateTimeData extends Data
{
    #[Computed]
    public readonly string $formatted;
    public function __construct(
        public readonly \Illuminate\Support\Carbon $value,
    )
    {
        $this->formatted = $this->value->format('d/m/y H:i');
    }
}
