<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Mapping\Contact;

use JobVerplanke\LaravelActiveCampaign\Contracts\Mapper;
use JobVerplanke\LaravelActiveCampaign\Traits\HasFields;
use Illuminate\Support\Enumerable;

class MapCreateContact implements Mapper
{
    use HasFields;

    /**
     * @template TKeyParam of array-key
     * @template TValueParam
     *
     * @param \Illuminate\Support\Enumerable<TKeyParam, TValueParam> $data
     *
     * @return array<string, TValueParam|null>
     */
    public function map(Enumerable $data): array
    {
        return [
            'email' => $data->get(key: 'email'),
        ];
    }
}
