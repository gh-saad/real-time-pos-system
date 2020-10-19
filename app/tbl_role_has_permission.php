<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_role_has_permission extends Model
{
    //
    public function tbl_role(){
        return $this->belongsTo->('App/tbl_role');
    }
    public function tbl_permission(){
        return $this->belongsTo->('App/tbl_permission');
    }
}
