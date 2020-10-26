<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class tbl_user extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password','role_id','is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         'password', 'remember_token'
    ];

    public function role(){
        return $this->belongsTo('App\tbl_role');
    }

    public function user_info(){
        return $this->belongsTo('App\tbl_user_info','id','user_id');
    }
}
