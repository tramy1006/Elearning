<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        // return [
        //     'user_id' => 'required',
        //     'question_id' => 'required',
        //     'correct' => 'required',
        //     'date' => 'required',
        // ];
    }
}
