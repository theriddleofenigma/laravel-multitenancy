<?php

namespace Enigma\Multitenancy\Events;

use Enigma\Multitenancy\Models\Tenant;

class MadeTenantCurrentEvent
{
    public function __construct(
        public Tenant $tenant
    ) {
    }
}
