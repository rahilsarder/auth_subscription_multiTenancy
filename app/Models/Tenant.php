<?php

namespace App\Models;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Models\Domain as ModelsDomain;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;

    public function domain()
    {
        return $this->hasOne(ModelsDomain::class, "tenant_id", 'id');
    }
}
