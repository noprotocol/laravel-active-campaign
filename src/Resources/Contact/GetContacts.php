<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Resources\Contact;

use JobVerplanke\LaravelActiveCampaign\Get;
use Illuminate\Http\Client\Response;

class GetContacts extends Get
{
    /**
     * @param array<int|string, int|string|null>|null $query
     *
     * @throws \Illuminate\Http\Client\RequestException
     */
    public function execute(?array $query = null): Response
    {
        return $this->get(resource: 'contacts', query: $query);
    }
}
