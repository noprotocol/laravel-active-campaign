<?php

declare(strict_types=1);

namespace JobVerplanke\LaravelActiveCampaign\Contracts;

interface Mappable
{
    public function mapUsing(): static;
    public function mapper(): Mapper;
}
