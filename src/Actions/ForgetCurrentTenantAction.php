<?php

namespace Enigma\Multitenancy\Actions;

use Enigma\Multitenancy\Events\ForgettingCurrentTenantEvent;
use Enigma\Multitenancy\Events\ForgotCurrentTenantEvent;
use Enigma\Multitenancy\Models\Tenant;
use Enigma\Multitenancy\Tasks\SwitchTenantTask;
use Enigma\Multitenancy\Tasks\TasksCollection;

class ForgetCurrentTenantAction
{
    public function __construct(
        protected TasksCollection $tasksCollection
    ) {
    }

    public function execute(Tenant $tenant)
    {
        event(new ForgettingCurrentTenantEvent($tenant));

        $this
            ->performTaskToForgetCurrentTenant()
            ->clearBoundCurrentTenant();

        event(new ForgotCurrentTenantEvent($tenant));
    }

    protected function performTaskToForgetCurrentTenant(): self
    {
        $this->tasksCollection->each(fn (SwitchTenantTask $task) => $task->forgetCurrent());

        return $this;
    }

    protected function clearBoundCurrentTenant()
    {
        $containerKey = config('multitenancy.current_tenant_container_key');

        app()->forgetInstance($containerKey);
    }
}
