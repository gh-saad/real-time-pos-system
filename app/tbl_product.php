<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_product extends Model
{
    //
    protected $fillable = [
        'pro_name', 'pro_sku', 'sale_price', 'unit_id', 'brand_id', 'cat_id'
    ];
 
    //
    public function brand(){
        return $this->belongsTo('App\tbl_brand','brand_id');
    }
    //
    public function category(){
        return $this->belongsTo('App\tbl_category','cat_id');
    }
    //
    public function unit(){
        return $this->belongsTo('App\tbl_unit','unit_id');
    }
}
