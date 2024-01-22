<?php

namespace App\Data;

#[\Spatie\TypeScriptTransformer\Attributes\TypeScript]
final class AuthorData extends \Spatie\LaravelData\Data
{
    public function __construct(
        public ?string $id,
        public string $name,
    ) {
    }
}
