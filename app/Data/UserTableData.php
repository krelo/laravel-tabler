<?php

namespace App\Data;

use App\Data\Casts\DateTimeCast;
use App\Data\Casts\StatusCast;
use App\Data\Transformers\DateTimeTransformer;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Attributes\WithTransformer;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[MapName(SnakeCaseMapper::class), TypeScript]
class UserTableData extends Data
{
    public function __construct(
        #[Column('User id',sortable: true),Required]
        public readonly int $id,
        #[Column('Name',sortable: true)]
        public readonly string $name,
        #[Column('Email',sortable: false)]
        public readonly string $email,
        #[Column('Status', type: 'Status', sortable: true), WithCast(StatusCast::class)]
        public readonly StatusData $status,
        #[Column('Created At', type: 'Date', sortable: true), WithCast(DateTimeCast::class)]
        public readonly DateTimeData $createdAt,

    )
    {
    }


}
