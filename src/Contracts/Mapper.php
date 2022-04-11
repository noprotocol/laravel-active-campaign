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
     * @template TKeyParam of array-key
     * @template TValueParam
     *
     * @param \Illuminate\Support\Enumerable<TKeyParam, TValueParam> $data
     *
     * @return array<int|string, TValue>
     */
    public function map(Enumerable $data): array;
}
