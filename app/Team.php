<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	public function setFirstNameAttribute($value)
	{
		$this->attributes['title'] = strtoupper($value);
	}
}
