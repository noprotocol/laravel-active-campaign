<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Resources\Contact;

use JobVerplanke\LaravelActiveCampaign\Get;
use Illuminate\Support\Collection;

/**
 * @template TKey of int|string
 * @template TValue
 *
 * @extends \JobVerplanke\LaravelActiveCampaign\Get<TKey, TValue>
 */
class GetFields extends Get
{
    /**
     * @param array<int|string, int|string|null>|null $query
     *
     * @throws \Illuminate\Http\Client\RequestException
     *
     * @return \Illuminate\Support\Collection<int, mixed>
     */
    public function execute(?array $query = null): Collection
    {
        /** @var \Illuminate\Contracts\Support\Arrayable<TKey, TValue>|iterable<TKey, TValue> $response */
        $response = $this->get(resource: 'fields', query: $query)->json(key: 'fields');

        return collect(value: $response)
            ->flatMap(callback: fn (array $field): array => [$field['perstag'] => $field['id']]);
    }
}
