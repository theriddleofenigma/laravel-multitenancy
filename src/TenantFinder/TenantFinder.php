<?php

namespace Enigma\Multitenancy\TenantFinder;

use Illuminate\Http\Request;
use Enigma\Multitenancy\Models\Tenant;

abstract class TenantFinder
{
    abstract public function findForRequest(Request $request): ?Tenant;
}
