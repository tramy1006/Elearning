<?php

namespace App\Http\Controllers;

use App\Question;
use App\QuestionsOption;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuestionsRequest;
use App\Http\Requests\UpdateQuestionsRequest;
use App\Lesson;
class QuestionsController extends Controller
{
    
    public function index()
    {
        $questions = Question::orderBy('lesson_id','DESC')->get();
     
        return view('admin.questions.index', compact('questions'));
    }

    public function create()
    {
        $relations = [
            'lessons' =>Lesson::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4',
            'option5' => 'Option #5'
        ];

        return view('admin.questions.create', compact('correct_options') + $relations);
    }

    public function store(StoreQuestionsRequest $request)
    {

        $question = Question::create($request->all());

        foreach ($request->input() as $key => $value) {
            if(strpos($key, 'option') !== false && $value != '') {
                $status = $request->input('correct') == $key ? 1 : 0;
                QuestionsOption::create([
                    'question_id' => $question->id,
                    'option'      => $value,
                    'correct'     => $status
                ]);
            }
        }

        return redirect()->route('questions.index');
    }

    public function edit($id)
    {
        $relations = [
            'lessons' =>Lesson::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];
        
      
        
        $question = Question::findOrFail($id);
        
        return view('admin.questions.edit', compact('question') + $relations);
    }

    public function update(UpdateQuestionsRequest $request, $id)
    {
        $question = Question::findOrFail($id);
        $question->update($request->all());

        return redirect('lesson/list');
    }

    public function show($id)
    {
        $relations = [
            'lessons' =>Lesson::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $question = Question::findOrFail($id);

        return view('admin.questions.show', compact('question') + $relations);
    }

    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('questions.index');
    }

    public function getAdd($id)
    {
        $less = Lesson::find($id);
        

      
        $correct_options = [
            'option1' => 'Option #1',
            'option2' => 'Option #2',
            'option3' => 'Option #3',
            'option4' => 'Option #4',
            'option5' => 'Option #5'
        ];

        return view('cate.lesson.addques', compact('less','correct_options'));

    }
    public function postAdd( StoreQuestionsRequest $request)
    {
        //$less = Lesson::find($id);
        $question = Question::create($request->all());

        foreach ($request->input() as $key => $value) {
            if(strpos($key, 'option') !== false && $value != '') {
                $status = $request->input('correct') == $key ? 1 : 0;
                QuestionsOption::create([
                    'question_id' => $question->id,
                    'option'      => $value,
                    'correct'     => $status
                ]);
            }
        }
        return redirect('/lesson/list');

    }
    public function deleteQuestion($id)
    {
        $question = Question::find($id);
        
        $question->delete();
        return redirect('/lesson/list')->with('thongbao', 'Xóa thành công');
    }
   
    

}
