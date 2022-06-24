<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Resources\Deal;

use JobVerplanke\LaravelActiveCampaign\Get;
use Illuminate\Http\Client\Response;

/**
 * @template TKey of int|string
 * @template TValue
 *
 * @extends \JobVerplanke\LaravelActiveCampaign\Get<TKey, TValue>
 */
class GetDeals extends Get
{
    /**
     * @param array<int|string, int|string|null>|null $query
     *
     * @throws \Illuminate\Http\Client\RequestException
     */
    public function execute(?array $query = null): Response
    {
        return $this->get(resource: 'deals', query: $query);
    }
}
