<?php

namespace Enigma\Multitenancy\Models\Concerns;

use Enigma\Multitenancy\Concerns\UsesMultitenancyConfig;

trait UsesLandlordConnection
{
    use UsesMultitenancyConfig;

    public function getConnectionName(): string
    {
        return $this->landlordDatabaseConnectionName();
    }
}
