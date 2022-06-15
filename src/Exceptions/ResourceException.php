<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Exceptions;

use Exception;

class ResourceException extends Exception
{
    public static function unknown(): ResourceException
    {
        return new ResourceException(message: 'Unknown resource');
    }
}
