<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Examples;

use JobVerplanke\LaravelActiveCampaign\Contracts\Mapper;
use Illuminate\Support\Enumerable;

class CustomMapCreateContact implements Mapper
{
    public function map(Enumerable $data): array
    {
        return [
            'foo' => 'bar'
        ];
    }
}
