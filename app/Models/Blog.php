<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table= "blog";
    public $timestamps = false;

    protected $fillable = ['id','type','author','title','detail','postdate'];


    public function category()
    {
        return $this->belongsTo('App\category\Category');
    }
}
