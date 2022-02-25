<?php

namespace Enigma\Multitenancy\Tests\Feature\Commands\TestClasses;

use Illuminate\Console\Command;
use Enigma\Multitenancy\Commands\Concerns\TenantAware;
use Enigma\Multitenancy\Models\Tenant;

class TenantNoopCommand extends Command
{
    use TenantAware;

    protected $signature = 'tenant:noop {--tenant=*}';

    protected $description = 'Execute noop for tenant(s)';

    public function handle()
    {
        $this->line('Tenant ID is '. Tenant::current()->id);
    }
}
