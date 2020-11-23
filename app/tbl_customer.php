<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_customer extends Model
{
    //
    protected $fillable = [
        'business_name', 'first_name','last_name','email','contact','alt_contact','address', 'area'
    ];
}
