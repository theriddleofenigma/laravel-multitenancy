<?php

namespace Enigma\Multitenancy\Http\Middleware;

use Closure;
use Enigma\Multitenancy\Exceptions\NoCurrentTenant;
use Enigma\Multitenancy\Models\Concerns\UsesTenantModel;

class NeedsTenant
{
    use UsesTenantModel;

    public function handle($request, Closure $next)
    {
        if (! $this->getTenantModel()::checkCurrent()) {
            return $this->handleInvalidRequest();
        }

        return $next($request);
    }

    public function handleInvalidRequest()
    {
        throw NoCurrentTenant::make();
    }
}
