<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Contracts;

use Illuminate\Support\Enumerable;

/**
 * @template TKey of int|string
 * @template TValue
 */
interface Mapper
{
    /**
     * @template TKeyMap of array-key
     * @template TValueMap
     *
     * @param \Illuminate\Support\Enumerable<TKeyMap, TValueMap> $data
     *
     * @return array<TKey, TValue>
     */
    public function map(Enumerable $data): array;
}
