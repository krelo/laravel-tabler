<?php

namespace App\Data;

use App\Models\User;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\PaginatedDataCollection;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class UserIndexViewModel extends Data
{
    public function __construct(
        #[DataCollectionOf(UserTableData::class)]
        public readonly PaginatedDataCollection $collection,
        #[DataCollectionOf(Column::class)]
        public readonly DataCollection $columns
    )
    {
    }

    public static function default(): self
    {
        $columns = self::getColumns(UserTableData::class);
        $sortable = collect($columns
            ->filter(fn(Column $col) => $col->sortable))
            ->map(fn($col) => $col['key'])
            ->toArray();
        return new self(
            UserTableData::collection(QueryBuilder::for(User::class)
                ->allowedSorts($sortable)
                ->paginate()),
            $columns
        );
    }

    protected static function getColumns(string $class): DataCollection
    {
        $results = [];
        $reflectionClass = new \ReflectionClass($class);
        $parameters = $reflectionClass->getConstructor()->getParameters();
        foreach ($parameters as $parameter){
            $columns = $parameter->getAttributes('App\Data\Column');
            if (!empty($columns)){
                foreach($columns as $column){
                    $args = $column->getArguments();
                    $results[] = self::createColumn($args, $parameter);
                }
            }
        }
        return Column::collection($results);
    }

    private static function createColumn(array $args, \ReflectionParameter $classParameter) : Column
    {
        $reflectionClass = new \ReflectionClass(Column::class);
        $parameters = $reflectionClass->getConstructor()->getParameters();
        $data = [];
        $index = 0;
        foreach ($parameters as $parameter){
            $name = $parameter->getName();
            if (isset($args[$name])){
                $data[$name] = $args[$name];
            }
            else if (isset($args[$index])){
                $data[$name] = $args[$index];
            }
            else if($parameter->isOptional() && $parameter->getDefaultValue() == null) {
                $data[$name] = $classParameter->getName();
            }
            $index++;
        }
        return Column::from($data);
    }


}
