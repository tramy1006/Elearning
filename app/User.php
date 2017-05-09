<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  
    protected $fillable = [
        'name', 'email', 'password','facebook_id', 'avatar', 'role',
       
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function comments(){
        return $this->hasMany('App\Comment','user_id', 'id');
    }
    

}
