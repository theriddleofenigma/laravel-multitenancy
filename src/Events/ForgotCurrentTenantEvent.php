<?php

namespace Enigma\Multitenancy\Events;

use Enigma\Multitenancy\Models\Tenant;

class ForgotCurrentTenantEvent
{
    public function __construct(
        public Tenant $tenant
    ) {
    }
}
