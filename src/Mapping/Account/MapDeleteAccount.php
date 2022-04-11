<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Mapping\Account;

use Illuminate\Support\Enumerable;
use JobVerplanke\LaravelActiveCampaign\Contracts\Mapper;

/**
 * @template TKey of int|string
 * @template TValue
 *
 * @implements \JobVerplanke\LaravelActiveCampaign\Contracts\Mapper<TKey, TValue>
 */
class MapDeleteAccount implements Mapper
{
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
        return [];
    }
}
