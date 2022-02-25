<?php

namespace Enigma\Multitenancy\Tests\Feature\Models;

use Illuminate\Notifications\Notifiable;
use Enigma\Multitenancy\Models\Tenant;

class TenantNotifiable extends Tenant
{
    use Notifiable;

    protected $table = 'tenants';

    protected $appends = [
        'email',
    ];

    public function getEmailAttribute()
    {
        return 'test@spatie.be';
    }
}
