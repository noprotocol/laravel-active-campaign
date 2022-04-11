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
class GetAccount extends Get
{
    /**
     * @throws \Illuminate\Http\Client\RequestException
     */
    public function execute(int $id): Response
    {
        return $this->get(resource: 'accounts/' . $id);
    }
}
