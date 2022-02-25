<?php

namespace Enigma\Multitenancy\Tests\Feature;

use Enigma\Multitenancy\Landlord;
use Enigma\Multitenancy\Models\Tenant;
use Enigma\Multitenancy\Tests\TestCase;

class LandlordTest extends TestCase
{
    protected Tenant $tenant;

    public function setUp(): void
    {
        parent::setUp();

        $this->tenant = Tenant::factory()->create();
    }

    /** @test */
    public function it_will_execute_a_callable_as_landlord_and_then_restore_the_previous_tenant()
    {
        $this->tenant->makeCurrent();

        $response = Landlord::execute(fn () => Tenant::current());

        $this->assertNull($response);

        $this->assertEquals($this->tenant->id, Tenant::current()->id);
    }
}
