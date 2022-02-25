<?php

namespace Enigma\Multitenancy\Tasks;

use Enigma\Multitenancy\Models\Tenant;

interface SwitchTenantTask
{
    public function makeCurrent(Tenant $tenant): void;

    public function forgetCurrent(): void;
}
