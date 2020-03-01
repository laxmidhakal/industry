<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company_has_contact extends Model
{
    public function getCompany()
    {
        return $this->belongsTo('App\Company','company_id','id');
    }
}
