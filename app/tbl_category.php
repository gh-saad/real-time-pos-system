<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_category extends Model
{
    //
    protected $fillable = [
        'cat_name', 'parent_id'
    ];
}
