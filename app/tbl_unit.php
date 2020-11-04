<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_unit extends Model
{
    //
    protected $fillable = [
        'unit_name', 'unit_short_name', 'allow_decimal', 'base_unit_id' , 'base_unit_mutiplier'
    ];
}
