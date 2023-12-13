<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

  public function orderlists()
  {
    return $this->hasMany(Orderlist::class);
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function carts()
  {
    return $this->hasMany(Cart::class);
  }
}