<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Question extends Model
{
    

    protected $fillable = ['question_text', 'code_snippet', 'answer_explanation', 'more_info_link', 'lesson_id'];

    public static function boot()
    {
        parent::boot();

        Question::observe(new \App\Observers\UserActionsObserver);
    }

    public function setTopicIdAttribute($input)
    {
        $this->attributes['lesson_id'] = $input ? $input : null;
    }

    public function lesson()
    {
         return $this->belongsTo(Lesson::class);
    }

    public function options()
    {
        return $this->hasMany(QuestionsOption::class);
    }
}
