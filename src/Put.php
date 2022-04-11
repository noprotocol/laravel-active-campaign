<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign;

use JobVerplanke\LaravelActiveCampaign\Contracts\Mappable as MappableContract;
use JobVerplanke\LaravelActiveCampaign\Traits\Mappable;
use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;

abstract class Put extends ActiveCampaign implements MappableContract
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
    protected function put(string $resource, array $data): Response
    {
        return $this->client->put(url: $resource, data: $data)
            ->throw(function (Response $response, RequestException $exception) {
                report(exception: $exception);
            });
    }
}
