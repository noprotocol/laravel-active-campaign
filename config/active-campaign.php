<?php

declare(strict_types=1);

return [
    'url' => env(key: 'ACTIVE_CAMPAIGN_URL'),
    'token' => env(key: 'ACTIVE_CAMPAIGN_TOKEN'),
    'fields' => [
        'limit' => env(key: 'ACTIVE_CAMPAIGN_FIELD_LIMIT'),
    ],
];
