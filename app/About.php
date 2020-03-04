<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User','created_by','id');
    }
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucwords($value);
    }
}
