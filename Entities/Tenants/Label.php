<?php

namespace Modules\Core\Entities\Tenants;

use Hyn\Tenancy\Traits\UsesTenantConnection;

class Label extends \Modules\Core\Entities\Label
{
    use UsesTenantConnection;
}
