<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign;

use JobVerplanke\LaravelActiveCampaign\Contracts\Mapper;
use JobVerplanke\LaravelActiveCampaign\Exceptions\ActiveCampaignException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class ActiveCampaign
{
    protected string $baseUrl;
    protected Mapper $mapper;
    protected PendingRequest $client;

    public function __construct()
    {
        $this->client();
    }

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    protected function client(): static
    {
        $this->client = Http::acceptJson()
            ->contentType(contentType: 'application/json')
            ->withHeaders(headers: [
                'Api-Token' => $this->token(),
            ])
            ->baseUrl(url: $this->baseUrl());

        return $this;
    }

    private function baseUrl(): string
    {
        /** @var string|null $configUrl */
        $configUrl = config(key: 'active-campaign.url');

        if (empty($configUrl)) {
            throw ActiveCampaignException::invalidBaseUrl();
        }

        $this->baseUrl = rtrim(string: $configUrl, characters: '/');

        return $this->baseUrl;
    }

    private function token(): string
    {
        /** @var string|null $token */
        $token = config(key: 'active-campaign.token');

        if (! empty($token)) {
            return $token;
        }

        throw ActiveCampaignException::invalidToken();
    }
}
