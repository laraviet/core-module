<?php

namespace Modules\Core\Entities\Traits\Scope;

use Modules\Core\Entities\Traits\Filterable\KeyFilterable;
use Modules\Core\Entities\Traits\Filterable\LabelSearchFilterable;

trait LabelScope
{
    use KeyFilterable, LabelSearchFilterable;
}
