<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucfirst($value);
    }
}
