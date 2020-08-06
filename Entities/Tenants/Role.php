<?php

namespace Modules\Core\Entities\Tenants;

use Hyn\Tenancy\Traits\UsesTenantConnection;

class Role extends \Modules\Core\Entities\Role
{
    use UsesTenantConnection;
}
