<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Mapping\Contact;

use Illuminate\Support\Enumerable;
use JobVerplanke\LaravelActiveCampaign\Contracts\Mapper;
use JobVerplanke\LaravelActiveCampaign\Contracts\Status;

/**
 * @template TKey of int|string
 * @template TValue
 *
 * @implements \JobVerplanke\LaravelActiveCampaign\Contracts\Mapper<TKey, TValue>
 */
class MapSubscribeContactToList implements Mapper
{
    /**
     * @template TKeyMap of array-key
     * @template TValueMap
     *
     * @param \Illuminate\Support\Enumerable<TKeyMap, TValueMap> $data
     *
     * @return array<string, TValueMap|int|null>
     */
    public function map(Enumerable $data): array
    {
        return [
            'list' => $data->get(key: 'list_id'),
            'contact' => $data->get(key: 'contact_id'),
            'status' => Status::SUBSCRIBE,
        ];
    }
}
