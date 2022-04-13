<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign;

use JobVerplanke\LaravelActiveCampaign\Contracts\Mappable as MappableContract;
use JobVerplanke\LaravelActiveCampaign\Traits\Mappable;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;

/**
 * @template TKey of int|string
 * @template TValue
 *
 * @extends \JobVerplanke\LaravelActiveCampaign\ActiveCampaign<TKey, TValue>
 * @implements MappableContract<TKey, TValue>
 */
abstract class Post extends ActiveCampaign implements MappableContract
{
    use Mappable;

    public function __construct()
    {
        parent::__construct();

        $this->client()->mapUsing();
    }

    /**
     * @param array<int|string, mixed> $data
     *
     * @throws \Illuminate\Http\Client\RequestException
     */
    protected function post(string $resource, array $data): Response
    {
        return $this->client->post(url: $resource, data: $data)
            ->throw(function (Response $response, RequestException $exception) {
                report(exception: $exception);
            });
    }
}
