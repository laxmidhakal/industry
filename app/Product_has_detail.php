<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_has_detail extends Model
{
	public function getProduct()
	{
		return $this->belongsTo('App\Product','product_id','id');
	}
	public function setTitleAttribute($value)
	{
	    $this->attributes['title'] = ucwords($value);
	}
}
