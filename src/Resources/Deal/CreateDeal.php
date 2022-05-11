<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Resources\Deal;

use JobVerplanke\LaravelActiveCampaign\Contracts\Mapper;
use JobVerplanke\LaravelActiveCampaign\Mapping\Deal\MapCreateDeal;
use JobVerplanke\LaravelActiveCampaign\Post;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Enumerable;

/**
 * @template TKey of int|string
 * @template TValue
 *
 * @extends \JobVerplanke\LaravelActiveCampaign\Post<TKey, TValue>
 */
class CreateDeal extends Post
{
    /**
     * @template TKeyExecute of int|string
     * @template TValueExecute
     *
     * @throws \Illuminate\Http\Client\RequestException
     *
     * @param \Illuminate\Support\Enumerable<TKeyExecute, TValueExecute> $data
     */
    public function execute(Enumerable $data): Response
    {
        $data = $this->mapper->map(data: $data);

        return $this->post(resource: 'deals', data: ['deal' => $data]);
    }

    /**
     * @return \JobVerplanke\LaravelActiveCampaign\Contracts\Mapper<int|string, mixed>
     */
    public function mapper(): Mapper
    {
        return new MapCreateDeal();
    }
}
