<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Resources\Contact;

use JobVerplanke\LaravelActiveCampaign\Get;
use Illuminate\Http\Client\Response;

/**
 * @template TKey of int|string
 * @template TValue
 *
 * @extends \JobVerplanke\LaravelActiveCampaign\Get<TKey, TValue>
 */
class GetDeal extends Get
{
    /**
     * @throws \Illuminate\Http\Client\RequestException
     */
    public function execute(int $id): Response
    {
        return $this->get(resource: 'deals/' . $id);
    }
}
