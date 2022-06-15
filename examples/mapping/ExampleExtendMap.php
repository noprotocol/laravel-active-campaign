<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Examples;

use Illuminate\Support\Facades\Route;
use JobVerplanke\LaravelActiveCampaign\Mapping\Contact\MapCreateContact;
use Illuminate\Support\Enumerable;
use JobVerplanke\LaravelActiveCampaign\Resources\Contact\CreateContact;

class ExampleExtendMap extends MapCreateContact
{
    public function map(Enumerable $data): array
    {
        return array_merge(
            parent::map(data: $data),
            ['foo' => 'bar']
        );
    }
}

Route::get('create-contact-extend-map', function () {
    $data = collect(value: [
        'email' => 'johndoe@example.com',
        'first_name' => 'John',
        'last_name' => 'Doe',
    ]);

    $createContact = new CreateContact();
    $response = $createContact
        ->mapUsing(class: ExampleExtendMap::class)
        ->execute(data: $data);

    return $response->json();
});
