<?php

namespace Enigma\Multitenancy\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Enigma\Multitenancy\Commands\Concerns\TenantAware;
use Enigma\Multitenancy\Concerns\UsesMultitenancyConfig;
use Enigma\Multitenancy\Models\Concerns\UsesTenantModel;
use Enigma\Multitenancy\Models\Tenant;

class TenantsArtisanCommand extends Command
{
    use UsesTenantModel;
    use UsesMultitenancyConfig;
    use TenantAware;

    protected $signature = 'tenants:artisan {artisanCommand} {--tenant=*}';

    public function handle()
    {
        if (! $artisanCommand = $this->argument('artisanCommand')) {
            $artisanCommand = $this->ask('Which artisan command do you want to run for all tenants?');
        }

        $artisanCommand = addslashes($artisanCommand);

        $tenant = Tenant::current();

        $this->line('');
        $this->info("Running command for tenant `{$tenant->name}` (id: {$tenant->getKey()})...");
        $this->line("---------------------------------------------------------");

        Artisan::call($artisanCommand, [], $this->output);
    }
}
