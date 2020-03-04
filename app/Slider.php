<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
	public function setTitleAttribute($value)
	{
	    $this->attributes['title'] = ucwords($value);
	}
}
