<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Resources\Contact;

use JobVerplanke\LaravelActiveCampaign\Contracts\Mapper;
use JobVerplanke\LaravelActiveCampaign\Mapping\Contact\MapCreateContact;
use JobVerplanke\LaravelActiveCampaign\Post;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Enumerable;

class CreateContact extends Post
{
    /**
     * @template TKey of int|string
     * @template TValue
     *
     * @throws \Illuminate\Http\Client\RequestException
     *
     * @param \Illuminate\Support\Enumerable<TKey, TValue> $data
     */
    public function execute(Enumerable $data): Response
    {
        $data = $this->mapper->map(data: $data);

        return $this->post(resource: 'contacts', data: ['contact' => $data]);
    }

    public function mapper(): Mapper
    {
        return new MapCreateContact();
    }
}
