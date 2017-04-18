<?php

namespace App\Http\Controllers;

use App\QuestionsOption;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuestionsOptionsRequest;
use App\Http\Requests\UpdateQuestionsOptionsRequest;

class QuestionsOptionsController extends Controller
{
  
    public function index()
    {
        $questions_options = QuestionsOption::all();

        return view('admin.questions_options.index', compact('questions_options'));
    }
    public function create()
    {
        $relations = [
            'questions' => \App\Question::get()->pluck('question_text', 'id')->prepend('Please select', ''),
        ];

        return view('admin.questions_options.create', $relations);
    }

    public function store(StoreQuestionsOptionsRequest $request)
    {
        QuestionsOption::create($request->all());

        return redirect()->route('questions_options.index');
    }

    public function edit($id)
    {
        $relations = [
            'questions' => \App\Question::get()->pluck('question_text', 'id')->prepend('Please select', ''),
        ];

        $questions_option = QuestionsOption::findOrFail($id);

        return view('admin.questions_options.edit', compact('questions_option') + $relations);
    }

    public function update(UpdateQuestionsOptionsRequest $request, $id)
    {
        $questionsoption = QuestionsOption::findOrFail($id);
        $questionsoption->update($request->all());

        return redirect()->route('questions_options.index');
    }
   
    public function show($id)
    {
        $relations = [
            'questions' => \App\Question::get()->pluck('question_text', 'id')->prepend('Please select', ''),
        ];

        $questions_option = QuestionsOption::findOrFail($id);

        return view('admin.questions_options.show', compact('questions_option') + $relations);
    }

    public function destroy($id)
    {
        $questionsoption = QuestionsOption::findOrFail($id);
        $questionsoption->delete();

        return redirect()->route('questions_options.index');
    }


}
