<?php

namespace Enigma\Multitenancy\Events;

use Enigma\Multitenancy\Models\Tenant;

class ForgettingCurrentTenantEvent
{
    public function __construct(
        public Tenant $tenant
    ) {
    }
}
