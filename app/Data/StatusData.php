<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\Computed;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\TypeScriptTransformer\Attributes\LiteralTypeScriptType;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[MapName(SnakeCaseMapper::class), TypeScript]
class StatusData extends Data
{
    #[Computed, LiteralTypeScriptType('enabled|disabled')]
    public readonly string $indicator;
    public readonly string $label;
    public function __construct(
        public readonly bool $value
    )
    {
        $this->indicator = $this->value ? 'enabled' : 'disabled';
        $this->label = $this->value ? 'Active' : 'Inactive';
    }
}
