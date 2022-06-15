<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Mapping\Contact;

use JobVerplanke\LaravelActiveCampaign\Contracts\Mapper;
use JobVerplanke\LaravelActiveCampaign\Traits\HasCustomFields;
use Illuminate\Support\Enumerable;

/**
 * @template TKey of int|string
 * @template TValue
 *
 * @implements \JobVerplanke\LaravelActiveCampaign\Contracts\Mapper<TKey, TValue>
 */
class MapCreateContact implements Mapper
{
    use HasCustomFields;

    /**
     * @template TKeyMap of array-key
     * @template TValueMap
     *
     * @param \Illuminate\Support\Enumerable<TKeyMap, TValueMap> $data
     *
     * @return array<string, TValueMap|null>
     */
    public function map(Enumerable $data): array
    {
        return [
            'email' => $data->get(key: 'email'),
        ];
    }
}
