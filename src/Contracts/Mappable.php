<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Contracts;

/**
 * @template TKey of int|string
 * @template TValue
 */
interface Mappable
{
    public function mapUsing(): static;


    /**
     * @return \JobVerplanke\LaravelActiveCampaign\Contracts\Mapper<TKey, TValue>
     */
    public function mapper(): Mapper;
}
