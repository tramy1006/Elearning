<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TestAnswer extends Model
{
    

    protected $fillable = ['user_id', 'test_id', 'question_id', 'option_id', 'correct'];

    public static function boot()
    {
        parent::boot();

        TestAnswer::observe(new \App\Observers\UserActionsObserver);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
     public function questionoption()
    {
        return $this->belongsTo(QuestionsOption::class);
    }
     public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
