<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
class Test extends Model
{

    protected $fillable = ['user_id', 'result','lesson_id'];

    public static function boot()
    {
        parent::boot();

        Test::observe(new \App\Observers\UserActionsObserver);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}

