<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_user_info extends Model
{
    //
    protected $fillable = [
        'user_id','first_name', 'last_name','email','contact_no','date_of_birth','curr_address','per_address'
    ];
}
