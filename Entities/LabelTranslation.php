<?php

namespace Modules\Core\Entities;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

class LabelTranslation extends Model
{
    use Cachable;

    protected $fillable = ['value'];
}
