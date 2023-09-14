<?php

namespace App\Data;

use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class UserTableData extends Data
{
    public function __construct(
        #[Column('User id',sortable: true),Required]
        public readonly int $id,
        #[Column('Name',sortable: true)]
        public readonly string $name,
        #[Column('Email',sortable: false)]
        public readonly string $email,
    )
    {
    }
}
