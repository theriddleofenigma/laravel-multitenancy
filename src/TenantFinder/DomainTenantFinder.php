<?php

namespace Enigma\Multitenancy\TenantFinder;

use Illuminate\Http\Request;
use Enigma\Multitenancy\Models\Concerns\UsesTenantModel;
use Enigma\Multitenancy\Models\Tenant;

class DomainTenantFinder extends TenantFinder
{
    use UsesTenantModel;

    public function findForRequest(Request $request): ?Tenant
    {
        $host = $request->getHost();

        return $this->getTenantModel()::whereDomain($host)->first();
    }
}
