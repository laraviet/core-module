<?php

namespace Modules\Core\Entities;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use Translatable;

    protected $fillable = ['key', 'module'];
    public $translatedAttributes = ['value'];
}
