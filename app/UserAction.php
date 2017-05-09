<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Query\Builder;
class UserAction extends Model
{
   
    
    protected $fillable = ['action', 'action_model', 'action_id', 'user_id'];
    

    public function setUserIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
        
    }
}
