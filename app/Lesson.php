<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = "lessons";
    public static function boot()
    {
        parent::boot();

        Lesson::observe(new \App\Observers\UserActionsObserver);
    }
    public function categories(){
    	return $this->belongsTo('App\Category','cate_id','id');
    }
    public function comments(){
    	return $this->hasMany('App\Comment','less_id','id');
    }
   


    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
