<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Traits;

use JobVerplanke\LaravelActiveCampaign\Resources\Fields\GetFields;
use Illuminate\Support\Collection;

trait HasFields
{
    /**
     * @throws \Illuminate\Http\Client\RequestException
     *
     * @return \Illuminate\Support\Collection<int, mixed>
     */
    public function fields(): Collection
    {
        $fields = new GetFields();

        /** @var int|null $limit */
        $limit = config(key: 'active-campaign.fields.limit');

        return $fields->execute(query: [
            'limit' => $limit,
        ]);
    }
}
