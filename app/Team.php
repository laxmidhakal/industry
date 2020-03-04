<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	public function setTitleAttribute($value)
	{
	    $this->attributes['title'] = ucfirst($value);
	}
}
