<?php

namespace Enigma\Multitenancy\Tests\Feature\Http\Middleware;

use Illuminate\Support\Facades\Route;
use Enigma\Multitenancy\Exceptions\NoCurrentTenant;
use Enigma\Multitenancy\Http\Middleware\NeedsTenant;
use Enigma\Multitenancy\Models\Tenant;
use Enigma\Multitenancy\Tests\TestCase;

class NeedsTenantTest extends TestCase
{
    protected Tenant $tenant;

    public function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();

        Route::get('middleware-test', fn () => 'ok')->middleware(NeedsTenant::class);

        $this->tenant = Tenant::factory()->create();
    }

    /** @test */
    public function it_will_pass_if_there_is_current_tenant_set()
    {
        $this->tenant->makeCurrent();

        $this->get('middleware-test')->assertOk();
    }

    /** @test */
    public function it_will_throw_an_exception_when_there_is_not_current_tenant()
    {
        $this->expectException(NoCurrentTenant::class);

        $this->get('middleware-test');
    }
}
