<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Resources\Account;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Enumerable;
use JobVerplanke\LaravelActiveCampaign\Contracts\Mapper;
use JobVerplanke\LaravelActiveCampaign\Delete;
use JobVerplanke\LaravelActiveCampaign\Mapping\Account\MapDeleteAccount;

/**
 * @template TKey of int|string
 * @template TValue
 *
 * @extends \JobVerplanke\LaravelActiveCampaign\Delete<TKey, TValue>
 */
class DeleteAccount extends Delete
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

        return $this->delete(resource: 'accounts/' . $id, data: ['account' => $data]);
    }

    /**
     * @return \JobVerplanke\LaravelActiveCampaign\Contracts\Mapper<int|string, mixed>
     */
    public function mapper(): Mapper
    {
        return new MapDeleteAccount();
    }
}
