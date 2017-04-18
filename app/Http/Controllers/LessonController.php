<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Category;
use App\Lesson;
use App\Comment;
use Cloudder;
use App\Question;
class LessonController extends Controller
{
    public function getList()
    {

    	$less = Lesson::orderBy('id','DESC')->get();
        $less = Lesson::paginate(5);
        $lessons = DB::table('lessons')->count();
        
        
        
    	return view('cate.lesson.list',['less'=>$less, 'lessons'=>$lessons]);
    }

    public function getAdd()
    {
    	$cate = Category::all();
    	return view('cate.lesson.add', ['cate'=>$cate]);
    }
    public function postAdd(Request $request)
    {
       $this->validate($request,
            [
                'category' => 'required',
                'tieude' => 'required|min:3|unique:lessons,title',
               
            ],
            [
                'category.required'=>' Bạn chưa chọn Category',
                'tieude.required'=>'Bạn chưa nhập tiêu đề',
                'tieude.min'=>'Tiêu đề ít nhất 3 kí tự',
                'tieude.unique'=> 'Tiêu đề đã tồn tại',
               
            ]
            );
            
        $less = new Lesson;
        $less->cate_id = $request->category;
        $less->title = $request->tieude;
        $less->tomtat = $request->tomtat;
        $less->noidung = $request->noidung;
        $less->luotxem = 0;
        $less->noibat = $request->noibat;        
        if($request->hasFile('hinh'))
        {
            $file = $request->hinh;
            Cloudder::upload($file,'khoaluan/' . $less->title);
            $less->hinh = Cloudder::getResult()['url'];
        
        }
        if($request->hasFile('media'))
        {
            
            $filename = $request->file('media');
            $name = $filename->getClientOriginalName();
            $media = str_random(4)."_".$name;
            while (file_exists("uploads/lesson/video/".$media)) {
                $media = str_random(4)."_".$name;
               
            }
            $filename->move("uploads/lesson/video",$media);
            $less->media= $media;
        
        }
        
        $less->save();
        return redirect('lesson/list')->with('thongbao', 'Thêm lesson thành công');
    }
    
    public function getEdit($id)
    {
        $cate = Category::all();
       
        $less = Lesson::find($id);
         
        return view('cate.lesson.edit',['less'=>$less, 'cate'=>$cate]);
    }
    public function postEdit(Request $request, $id)
    {
        $cate = Category::all();
        $less = Lesson::find($id);
       
        Cloudder::delete('khoaluan/'. $less->title,array("resource_type" => "video"));
        $less->cate_id = $request->category;
        $less->title = $request->tieude;
        $less->tomtat = $request->tomtat;
        $less->noidung = $request->noidung;
        $less->noibat = $request->noibat; 
       

        Cloudder::destroyImage('khoaluan/'. $less->title);
        if($request->hasFile('hinh'))
        {
            
            $file = $request->hinh;
            Cloudder::upload($file,'khoaluan/' . $less->title);
            $less->hinh = Cloudder::getResult()['url'];
           
        }
        if($request->hasFile('media'))
        {
            
            
           
        }
       
        $less->save();
        return redirect('/lesson/list')->with('thongbao', 'Sửa lesson thành công');
    }
    
    public function getDelete($id)
    {
        $less = Lesson::find($id);
        $less->delete();
        return redirect('/lesson/list')->with('thongbao', 'Xóa thành công');
    }
    //xóa nhiều
     public function destroy(Request $request)
    {
        $this->validate($request, [
            'checked' => 'required',
        ]);

        $checked = $request->input('checked');

        Lesson::destroy($checked);
        return redirect('/lesson/list')->with('thongbao','xóa thành công');
    }
    public function getQuestion($id)
    {
        $lesson = Lesson::find($id);
        $questions = DB::table('lessons')
                    ->join('questions','lessons.id','=','questions.lesson_id')
                    ->select('questions.question_text','questions.id','lessons.title')
                    ->where('lesson_id',$lesson->id)
                    ->get();
                //dd($questions);
       return view('cate.lesson.question',['questions'=>$questions,'lesson'=>$lesson]);
        
    }
    
}
