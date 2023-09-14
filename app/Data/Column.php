<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[\Attribute, TypeScript, MapName(SnakeCaseMapper::class)] class Column extends Data
{
    public function __construct(
        public ?string $label = null,
        public ?string $key = null,
        public ?string $type = 'text',
        public bool $sortable = false,
        public ?string $sortKey = null,
    )
    {

    }
}
