<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Examples;

use JobVerplanke\LaravelActiveCampaign\Mapping\Contact\MapCreateContact;
use Illuminate\Support\Enumerable;

class ExtendMapCreateContact extends MapCreateContact
{
    public function map(Enumerable $data): array
    {
        return array_merge(parent::map(data: $data), [
            'foo' => 'bar'
        ]);
    }
}
