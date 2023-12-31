<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','price','quantity','user_id'];
    function user(){
      return $this->belongsTo(User::class,'user_id','id');
    }
}
