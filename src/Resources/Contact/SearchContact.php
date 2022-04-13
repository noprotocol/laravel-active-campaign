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
class SearchContact extends Get
{
    /**
     * @param array<int|string, int|string|null>|null $query
     *
     * @throws \Illuminate\Http\Client\RequestException
     */
    public function execute(string $term, ?array $query = null): Response
    {
        if ($query === null) {
            return $this->get(resource: 'contacts', query: ['search' => $term]);
        }

        $query = array_merge(['search' => $term], $query);

        return $this->get(resource: 'contacts', query: $query);
    }
}
