<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign;

use Illuminate\Http\Client\RequestException;
use Illuminate\Http\Client\Response;

abstract class Get extends ActiveCampaign
{
    /**
     * @param array<int|string, int|string|null>|null $query
     *
     * @throws \Illuminate\Http\Client\RequestException
     */
    protected function get(string $resource, ?array $query = null): Response
    {
        return $this->client->get(url: $resource, query: $query)
            ->throw(function (Response $response, RequestException $exception) {
                report(exception: $exception);
            });

    }
}
