<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Resources\Account;

use Illuminate\Http\Client\Response;
use JobVerplanke\LaravelActiveCampaign\Get;

/**
 * @template TKey of int|string
 * @template TValue
 *
 * @extends \JobVerplanke\LaravelActiveCampaign\Get<TKey, TValue>
 */
class GetAccounts extends Get
{
    /**
     * @param array<int|string, int|string|null>|null $query
     *
     * @throws \Illuminate\Http\Client\RequestException
     */
    public function execute(?array $query = null): Response
    {
        return $this->get(resource: 'accounts', query: $query);
    }
}
