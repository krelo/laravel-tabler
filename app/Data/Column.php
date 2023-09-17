<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\Computed;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\TypeScriptTransformer\Attributes\LiteralTypeScriptType;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;
use Spatie\TypeScriptTransformer\Attributes\TypeScriptTransformer;
use Spatie\TypeScriptTransformer\Attributes\TypeScriptType;

#[\Attribute, TypeScriptTransformer(GenericTransformer::class), MapName(SnakeCaseMapper::class)] class Column extends Data
{
    #[Computed]
    public readonly string $sortUrl;
    #[Computed,LiteralTypeScriptType('null|"ASC"|"DESC"')]
    public readonly ?string $sortDirection;
    public function __construct(
        public ?string $label = null,
        #[LiteralTypeScriptType('keyof T')]
        public ?string $key = null,
        #[LiteralTypeScriptType('string')]
        public ?string $type = 'Text',
        public bool $sortable = false,
        public ?string $sortKey = null,
    )
    {
        $sort = \Request::get('sort');
        if ($sort == $this->sortKey){
            $this->sortDirection = 'ASC';
            $this->sortUrl = route('users.index', ['sort' => '-'.$this->sortKey]);
        }
        else if ($sort == '-'.$this->sortKey){
            $this->sortUrl = route('users.index', ['sort' => $this->sortKey]);
            $this->sortDirection = 'DESC';
        }
        else {
            $this->sortUrl = route('users.index', ['sort' => $this->sortKey]);
            $this->sortDirection = null;
        }
    }
}
