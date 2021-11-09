<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['product_name','category_id','sub_category_id','brand_id','product_code','big_unit_id',
'small_unit_id','specification','stock_limitation','slug','status','created_by'];
   

public function categori(){
    return $this->belongsTo(Categori::class,'category_id','id');
}
public function subcategori(){
    return $this->belongsTo(SubCategori::class,'sub_category_id','id');
}
public function brand(){
    return $this->belongsTo(Brand::class,'brand_id','id');
}
public function bigunit(){
    return $this->belongsTo(Unit::class,'big_unit_id','id');
}
public function smallunit(){
    return $this->belongsTo(Unit::class,'small_unit_id','id');
}
public function creator(){
    return $this->belongsTo(User::class,'created_by','id')->select('name','id');
}
}
