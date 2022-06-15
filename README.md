# Active Campaign API for Laravel

[![Tests](https://github.com/noprotocol/laravel-active-campaign/actions/workflows/tests.yml/badge.svg)](https://github.com/noprotocol/laravel-active-campaign/actions/workflows/tests.yml)
[![Static Analysis](https://github.com/noprotocol/laravel-active-campaign/actions/workflows/phpstan.yml/badge.svg)](https://github.com/noprotocol/laravel-active-campaign/actions/workflows/phpstan.yml)

## Examples
### Example for extending an existing mapping
```php
/**
 * Mapping class extending the base mapping class 
 */
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

/**
 * Controller action 
 */
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
```

### Example for custom mapping
```php
/**
 * Custom mapping class 
 */
class ExampleCustomMap implements Mapper
{
    public function map(Enumerable $data): array
    {
        return [
            'foo' => 'bar'
        ];
    }
}

/**
 * Controller action 
 */
Route::get('create-contact-custom-map', function () {
    $data = collect(value: [
        'email' => 'johndoe@example.com',
        'first_name' => 'John',
        'last_name' => 'Doe',
    ]);

    $createContact = new CreateContact();
    $response = $createContact
        ->mapUsing(class: ExampleCustomMap::class)
        ->execute(data: $data);

    return $response->json();
});
```

### Example for custom mapping with custom fields

#### How to determine the correct resource for custom fields?
Getting custom fields of a resource is determined by the resource name. 
The convention used to determine the correct resource is the navigation title on the left side at [the documentation](https://developers.activecampaign.com/reference) page lowercased.

Custom fields is only supported for resources that support custom fields

| Resource | navigation title |
|----------|------------------|
| accounts | ACCOUNTS         |
| contacts | CONTACTS         |
| deals    | DEALS            |

```php
/**
 * Custom mapping class with custom fields
 */
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

/**
 * Controller action 
 */
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
```
