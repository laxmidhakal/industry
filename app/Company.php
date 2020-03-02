<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function getCompanyContact()
    {
        return $this->hasOne('App\Company_has_contact');
    }
}
