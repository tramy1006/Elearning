<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "post";

    public function category(){
    	return $this->belongsTo('App\Category','cate_id', 'id');
    }
    public function users(){
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
