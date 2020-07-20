<?php

namespace Modules\Core\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Entities\Traits\Scope\LabelScope;

class Label extends Model
{
    use Translatable, LabelScope;

    protected $fillable = ['key', 'module'];
    public $translatedAttributes = ['value'];
}
