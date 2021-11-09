<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categori extends Model
{
    use HasFactory;
    protected $table = 'categoris';
    protected $fillable = ['name','slug','created_by'];

    public function subCategoriData(){
        return $this->hasMany(SubCategori::class,'category_id','id');
    }
}
