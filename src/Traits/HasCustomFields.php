<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Traits;

use Illuminate\Support\Collection;
use JobVerplanke\LaravelActiveCampaign\Exceptions\ResourceException;
use JobVerplanke\LaravelActiveCampaign\Resources\Contact\GetFields as ContactFields;
use JobVerplanke\LaravelActiveCampaign\Resources\Deal\GetFields as DealFields;

trait HasCustomFields
{
    /**
     * @throws \Illuminate\Http\Client\RequestException
     * @throws \JobVerplanke\LaravelActiveCampaign\Exceptions\ResourceException
     *
     * @return \Illuminate\Support\Collection<int, mixed>
     */
    public function getCustomFieldsFor(string $resource): Collection
    {
        $class = match ($resource) {
            'contacts' => ContactFields::class,
            'deals' => DealFields::class,
            default => ResourceException::unknown()
        };

        $fields = new $class();

        /** @var int|null $limit */
        $limit = config(key: 'active-campaign.fields.limit');

        return $fields->execute(query: [
            'limit' => $limit,
        ]);
    }
}
