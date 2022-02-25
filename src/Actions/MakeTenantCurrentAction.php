<?php

namespace Enigma\Multitenancy\Actions;

use Enigma\Multitenancy\Events\MadeTenantCurrentEvent;
use Enigma\Multitenancy\Events\MakingTenantCurrentEvent;
use Enigma\Multitenancy\Models\Tenant;
use Enigma\Multitenancy\Tasks\SwitchTenantTask;
use Enigma\Multitenancy\Tasks\TasksCollection;

class MakeTenantCurrentAction
{
    public function __construct(
        protected TasksCollection $tasksCollection
    ) {
    }

    public function execute(Tenant $tenant)
    {
        event(new MakingTenantCurrentEvent($tenant));

        $this
            ->performTasksToMakeTenantCurrent($tenant)
            ->bindAsCurrentTenant($tenant);

        event(new MadeTenantCurrentEvent($tenant));

        return $this;
    }

    protected function performTasksToMakeTenantCurrent(Tenant $tenant): self
    {
        $this->tasksCollection->each(fn (SwitchTenantTask $task) => $task->makeCurrent($tenant));

        return $this;
    }

    protected function bindAsCurrentTenant(Tenant $tenant): self
    {
        $containerKey = config('multitenancy.current_tenant_container_key');

        app()->forgetInstance($containerKey);

        app()->instance($containerKey, $tenant);

        return $this;
    }
}
