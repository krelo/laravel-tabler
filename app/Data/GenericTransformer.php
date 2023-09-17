<?php

namespace App\Data;
use ReflectionAttribute;
use ReflectionClass;
use Spatie\LaravelData\Resolvers\NameMappersResolver;
use Spatie\TypeScriptTransformer\Structures\MissingSymbolsCollection;
use Spatie\TypeScriptTransformer\Structures\TransformedType;
use Spatie\TypeScriptTransformer\Transformers\Transformer as TransformerAlias;
use Spatie\TypeScriptTransformer\Transformers\TransformsTypes;

class GenericTransformer implements TransformerAlias
{
    use TransformsTypes;

    public function transform(ReflectionClass $class, string $name): ?TransformedType
    {
        $missingSymbols = new MissingSymbolsCollection();

        $attributes = collect($class->getAttributes())
            ->filter(fn (ReflectionAttribute $reflectionAttribute) => class_exists($reflectionAttribute->getName()))
            ->map(fn (ReflectionAttribute $reflectionAttribute) => $reflectionAttribute->newInstance());
        $mappers = NameMappersResolver::create()->execute($attributes);
        if (isset($mappers['outputNameMapper'])){
            $nameMapper = fn ($name) => $mappers['outputNameMapper']->map($name);
        }
        else {
            $nameMapper = fn($name) => $name;
        }

        $properties = array_map(
            fn(\ReflectionProperty $reflection) => "{$nameMapper($reflection->name)}: {$this->reflectionToTypeScript($reflection, $missingSymbols)};",
            array_filter($class->getProperties(),fn($property) => ! \Str::startsWith($property->getName(),'_'))
        );

        return TransformedType::create(
            $class,
            $name.'<T>',
            '{'. join($properties) . '}',
            $missingSymbols
        );
    }
}
