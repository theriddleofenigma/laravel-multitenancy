<?php

namespace Enigma\Multitenancy\Models\Concerns;

use Enigma\Multitenancy\Concerns\UsesMultitenancyConfig;

trait UsesTenantConnection
{
    use UsesMultitenancyConfig;

    public function getConnectionName(): string
    {
        return $this->tenantDatabaseConnectionName();
    }
}
