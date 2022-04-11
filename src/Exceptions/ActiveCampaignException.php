<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Exceptions;

use RuntimeException;

class ActiveCampaignException extends RuntimeException
{
    public static function mapping(string $class): ActiveCampaignException
    {
        return new ActiveCampaignException(message: 'Class [' . class_basename(class: $class) . '] must implement the Mapper contract');
    }

    public static function invalidBaseUrl(): ActiveCampaignException
    {
        return new ActiveCampaignException(message: 'Active Campaign baseUrl is invalid');
    }

    public static function invalidToken(): ActiveCampaignException
    {
        return new ActiveCampaignException(message: 'Active Campaign token is invalid');
    }
}
