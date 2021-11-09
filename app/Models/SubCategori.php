<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategori extends Model
{
    use HasFactory;
    protected $table = 'sub_categoris';
    protected $fillable = ['name','slug','created_by','category_id'];
}
