<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Resources\Contact;

use JobVerplanke\LaravelActiveCampaign\Contracts\Mapper;
use JobVerplanke\LaravelActiveCampaign\Contracts\Status;
use JobVerplanke\LaravelActiveCampaign\Post;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Enumerable;

class SubscribeContactToList extends Post
{
    /**
     * @template TKey of int|string
     * @template TValue
     *
     * @param \Illuminate\Support\Enumerable<TKey, TValue> $data
     *
     * @throws \Illuminate\Http\Client\RequestException
     */
    public function execute(Enumerable $data): Response
    {
        return $this->post(resource: 'contactLists', data: $this->mapper()->map(data: $data));
    }

    public function mapper(): Mapper
    {
        return new class implements Mapper
        {
            public function map(Enumerable $data): array
            {
                return [
                    'list' => $data->get(key: 'list_id'),
                    'contact' => $data->get(key: 'contact_id'),
                    'status' => Status::SUBSCRIBE,
                ];
            }
        };
    }
}
