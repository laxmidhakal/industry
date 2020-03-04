<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	public function getProductDetail()
	{
		return $this->hasMany('App\Product_has_detail','product_id','id');
	}
	public function setTitleAttribute($value)
	{
	    $this->attributes['title'] = ucwords($value);
	}
}
