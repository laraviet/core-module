<?php

namespace Modules\Core\Entities\Tenants;

use Hyn\Tenancy\Traits\UsesTenantConnection;

class User extends \Modules\Core\Entities\User
{
    use UsesTenantConnection;
}
