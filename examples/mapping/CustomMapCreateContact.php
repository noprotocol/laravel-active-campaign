<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Examples;

use Illuminate\Support\Facades\Route;
use JobVerplanke\LaravelActiveCampaign\Contracts\Mapper;
use Illuminate\Support\Enumerable;
use JobVerplanke\LaravelActiveCampaign\Resources\Contact\CreateContact;

class CustomMapCreateContact implements Mapper
{
    public function map(Enumerable $data): array
    {
        return [
            'foo' => 'bar'
        ];
    }
}

Route::get('create-contact-custom-map', function () {
    $data = collect(value: [
        'email' => 'johndoe@example.com',
        'first_name' => 'John',
        'last_name' => 'Doe',
    ]);

    $createContact = new CreateContact();
    $response = $createContact
        ->mapUsing(class: CustomMapCreateContact::class)
        ->execute(data: $data);

    return $response->json();
});
