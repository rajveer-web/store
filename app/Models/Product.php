<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table= "product";
    public $timestamps = false;

    protected $fillable = ['category_id','name','image','description','price'];


    public function category()
    {
        return $this->belongsTo('App\category\Category');
    }
}
