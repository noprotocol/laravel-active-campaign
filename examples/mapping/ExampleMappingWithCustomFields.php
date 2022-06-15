<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Examples;

use Illuminate\Support\Enumerable;
use Illuminate\Support\Facades\Route;
use JobVerplanke\LaravelActiveCampaign\Contracts\Mapper;
use JobVerplanke\LaravelActiveCampaign\Resources\Contact\CreateContact;
use JobVerplanke\LaravelActiveCampaign\Traits\HasCustomFields;

class ExampleMappingWithCustomFields implements Mapper
{
    use HasCustomFields;

    /**
     * @throws \JobVerplanke\LaravelActiveCampaign\Exceptions\ResourceException
     * @throws \Illuminate\Http\Client\RequestException
     */
    public function map(Enumerable $data): array
    {
        $fields = $this->getCustomFieldsFor(resource: 'contacts');

        return [
            'foo' => 'bar',
            'custom_field' => $fields->get(key: 'PERSTAG')
        ];
    }
}



Route::get('create-contact-custom-map-with-custom-fields', function () {
    $data = collect(value: [
        'email' => 'johndoe@example.com',
        'first_name' => 'John',
        'last_name' => 'Doe',
    ]);

    $createContact = new CreateContact();
    $response = $createContact
        ->mapUsing(class: ExampleMappingWithCustomFields::class)
        ->execute(data: $data);

    return $response->json();
});
