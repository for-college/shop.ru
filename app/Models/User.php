<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use HasFactory, HasApiTokens;

  public function orders()
  {
    return $this->hasMany(Order::class);
  }

  public function carts()
  {
    return $this->hasMany(Cart::class);
  }

  public function role()
  {
    return $this->belongsTo(Role::class);
  }

  protected $fillable = [
    'surname',
    'name',
    'patronymic',
    'sex',
    'birth',
    'login',
    'password',
    'email',
  ];
  protected $hidden = [
    'created_at',
    'updated_at',
    'api_token'
  ];
}
