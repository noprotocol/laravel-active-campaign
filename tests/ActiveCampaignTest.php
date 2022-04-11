<?php

declare(strict_types=1);

namespace Tests;

use JobVerplanke\LaravelActiveCampaign\ActiveCampaign;
use JobVerplanke\LaravelActiveCampaign\Exceptions\ActiveCampaignException;

class ActiveCampaignTest extends TestCase
{
    /**
     * @test it has a base url
     */
    public function test_it_has_a_base_url()
    {
        $config = require __DIR__.'/../config/active-campaign.php';

        $url = env('ACTIVE_CAMPAIGN_URL');

        $this->assertSame($url, $config['url']);
    }

    /**
     * @test it throws an exception when base url is not set
     */
    public function test_it_throws_an_exception_when_base_url_is_not_set()
    {
        $this->expectException(ActiveCampaignException::class);
        $this->expectExceptionMessage('Active Campaign baseUrl is invalid');

        config()->set('active-campaign.url', '');

        new ActiveCampaign();
    }

    /**
     * @test it throws an exception when token is not set
     */
    public function test_it_throws_an_exception_when_token_is_not_set()
    {
        $this->expectException(ActiveCampaignException::class);
        $this->expectExceptionMessage('Active Campaign token is invalid');

        config()->set('active-campaign.token', '');

        new ActiveCampaign();
    }

    /**
     * @test it trims additional slashes at the end of the base url
     */
    public function test_it_trims_additional_slashes_at_the_end_of_the_base_url()
    {
        putenv('ACTIVE_CAMPAIGN_URL=https://example.com/api/3/');
        config()->set('active-campaign.url', env('ACTIVE_CAMPAIGN_URL'));

        $activeCampaign = new ActiveCampaign();

        $this->assertSame('https://example.com/api/3', $activeCampaign->getBaseUrl());
    }
}
