<?php

namespace Modules\Core\Entities\Tenants;

use Hyn\Tenancy\Traits\UsesTenantConnection;

class LabelTranslation extends \Modules\Core\Entities\LabelTranslation
{
    use UsesTenantConnection;
}
