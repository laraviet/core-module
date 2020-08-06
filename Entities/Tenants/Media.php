<?php

namespace Modules\Core\Entities\Tenants;

use Hyn\Tenancy\Traits\UsesTenantConnection;

class Media extends \Spatie\MediaLibrary\Models\Media
{
    use UsesTenantConnection;
}
