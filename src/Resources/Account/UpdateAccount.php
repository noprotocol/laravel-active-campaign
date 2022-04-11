<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Resources\Account;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Enumerable;
use JobVerplanke\LaravelActiveCampaign\Contracts\Mapper;
use JobVerplanke\LaravelActiveCampaign\Mapping\Account\MapUpdateAccount;
use JobVerplanke\LaravelActiveCampaign\Put;

/**
 * @template TKey of int|string
 * @template TValue
 *
 * @extends \JobVerplanke\LaravelActiveCampaign\Put<TKey, TValue>
 */
class UpdateAccount extends Put
{
    /**
     * @template TKeyExecute of int|string
     * @template TValueExecute
     *
     * @throws \Illuminate\Http\Client\RequestException
     *
     * @param \Illuminate\Support\Enumerable<TKeyExecute, TValueExecute> $data
     */
    public function execute(int $id, Enumerable $data): Response
    {
        $data = $this->mapper->map(data: $data);

        return $this->put(resource: 'accounts/' . $id, data: ['account' => $data]);
    }

    /**
     * @return \JobVerplanke\LaravelActiveCampaign\Contracts\Mapper<int|string, mixed>
     */
    public function mapper(): Mapper
    {
        return new MapUpdateAccount();
    }
}
