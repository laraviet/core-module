<?php

namespace Modules\Core\Entities\Tenants;

use Hyn\Tenancy\Traits\UsesTenantConnection;

class Permission extends \Modules\Core\Entities\Permission
{
    use UsesTenantConnection;
}
