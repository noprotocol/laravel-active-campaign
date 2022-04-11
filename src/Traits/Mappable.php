<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Traits;

use JobVerplanke\LaravelActiveCampaign\Contracts\Mapper;
use JobVerplanke\LaravelActiveCampaign\Exceptions\ActiveCampaignException;

trait Mappable
{
    public function mapUsing(?string $class = null): static
    {
        if ($class === null) {
            $this->mapper = $this->mapper();

            return $this;
        }

        $mapper = new $class();

        if (! $mapper instanceof Mapper) {
            throw ActiveCampaignException::mapping(class: $class);
        }

        $this->mapper = $mapper;

        return $this;
    }
}
