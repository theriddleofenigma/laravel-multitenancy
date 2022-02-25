<?php

namespace Enigma\Multitenancy\Models\Concerns;

use Enigma\Multitenancy\Models\Tenant;

trait UsesTenantModel
{
    public function getTenantModel(): Tenant
    {
        $tenantModelClass = config('multitenancy.tenant_model');

        return new $tenantModelClass();
    }
}
