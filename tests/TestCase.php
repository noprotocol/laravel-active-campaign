<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Tests;

use JobVerplanke\LaravelActiveCampaign\ActiveCampaignServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            ActiveCampaignServiceProvider::class
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        putenv('ACTIVE_CAMPAIGN_URL=https://example.com');
        putenv('ACTIVE_CAMPAIGN_TOKEN=abc');
        putenv('ACTIVE_CAMPAIGN_LIMIT=100');

        $app['config']->set('active-campaign.url', env('ACTIVE_CAMPAIGN_URL'));
        $app['config']->set('active-campaign.token', env('ACTIVE_CAMPAIGN_TOKEN'));
        $app['config']->set('active-campaign.fields.limit', env('ACTIVE_CAMPAIGN_LIMIT'));
    }
}
