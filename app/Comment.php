<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";

    public function lessons(){
    	return $this->belongsTo('App\Lesson','less_id', 'id');
    }
    public function users(){
    	return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
