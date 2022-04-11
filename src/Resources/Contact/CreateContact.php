<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Resources\Contact;

use JobVerplanke\LaravelActiveCampaign\Contracts\Mapper;
use JobVerplanke\LaravelActiveCampaign\Mapping\Contact\MapCreateContact;
use JobVerplanke\LaravelActiveCampaign\Post;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Enumerable;

/**
 * @template TKey of int|string
 * @template TValue
 *
 * @extends \JobVerplanke\LaravelActiveCampaign\Post<TKey, TValue>
 */
class CreateContact extends Post
{
    /**
     * @template TKeyExecute of int|string
     * @template TValueExecute
     *
     * @throws \Illuminate\Http\Client\RequestException
     *
     * @param \Illuminate\Support\Enumerable<TKeyExecute, TValueExecute> $data
     */
    public function execute(Enumerable $data): Response
    {
        $data = $this->mapper->map(data: $data);

        return $this->post(resource: 'contacts', data: ['contact' => $data]);
    }

    /**
     * @return \JobVerplanke\LaravelActiveCampaign\Contracts\Mapper<int|string, mixed>
     */
    public function mapper(): Mapper
    {
        return new MapCreateContact();
    }
}
