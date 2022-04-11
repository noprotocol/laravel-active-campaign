<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign;

use Illuminate\Support\ServiceProvider;

class ActiveCampaignServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes(paths: [
                __DIR__.'/../config/active-campaign.php' => config_path(path: 'active-campaign.php'),
            ], groups: 'active-campaign-config');
        }
    }
}
