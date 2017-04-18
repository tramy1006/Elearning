<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionsRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'lesson_id'           => 'required',
            'question_text'      => 'required',
            'answer_explanation' => 'required',
        ];
    }
}
