<?php

namespace Enigma\Multitenancy\Events;

use Enigma\Multitenancy\Models\Tenant;

class MakingTenantCurrentEvent
{
    public function __construct(
        public Tenant $tenant
    ) {
    }
}
