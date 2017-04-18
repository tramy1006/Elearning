<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use Image;
use App\Category;
use App\Lesson;
use App\Comment;
use App\Slide;
use Cloudder;
use Charts;
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $cate = Category::all();
        $slide= Slide::all();
        view()->share('cate', $cate);
        view()->share('slide',$slide);
    }

    public function index()
    {
        
        return view('home');
    }
    public function contact(){
        
        return view('contact.index');
    }   
   
    public function welcome()
    {
        $cate = Category::all();
        return view('welcome');
    }
      public function theloai($id)
    {
        $catt = Category::find($id);
        $less = Lesson::where('cate_id', $id)->paginate(2);
        return view('pages.cate', ['catt'=>$catt, 'less'=>$less]);
    }
    public function chitiet($id)
    {
        
        $less = Lesson::find($id);
        $less->increment('luotxem');
        
       
        $lessnoibat = Lesson::where('noibat', 1)->take(4)->get();
        $lesslienquan = Lesson::where('cate_id', $less->cate_id)->take(4)->get();
        return view('pages.chitiet', ['less'=>$less, 'lessnoibat'=>$lessnoibat, 'lesslienquan'=>$lesslienquan]);
    }
    public function timkiem(Request $request)
    {
        $tukhoa = $request->tukhoa;
        $less = Lesson::where('title', 'like', "%$tukhoa%")->orWhere('tomtat', 'like', "%$tukhoa%")->orWhere('noidung', 'like', "%$tukhoa%")->take(30)->get();
        return view('pages.search', ['less'=>$less, 'tukhoa'=>$tukhoa]);
    }
   public function profile()
    {
        return view('admin.profile', array('user'=>Auth::user()));
    }
    public function update_profile(Request $request)
    {
       $user = Auth::user();
       Cloudder::destroyImage('khoaluan/'. $user->name);
        if($request->hasFile('avatar')){
            $filename = $request->avatar;
           
            Cloudder::upload($filename,'khoaluan/' . $user->name);
            $user->avatar = Cloudder::getResult()['url'];
        }
           $user->save();  
        
        return view('admin.profile', array('user'=>Auth::user()));
    }
    public function getEdit( $id)
    {
        $user = Auth::user();
        return view('admin.setup', ['user'=>$user]);
    }
    public function postEdit(Request $request,$id)
    {
        
        $this->validate($request, 
            [
                'name' =>'required|unique:users,name|min:3|max:100',
                
                
            ], 
            [
                'name.required'=>' Bạn chưa nhập tên',
                'name.unique'=>'Tên đã tồn tại',
                'name.min'=>'Tên ít nhất 3 kí tự',
                'name.max'=>'Tên nhiều nhất 100 kí tự'
               
            ]);
        $user=User::find($id);
        $user->name = $request->name;
        if($request->changePassword =="on")
        {
             $this->validate($request, 
            [
                  'password'=>'required|min:6|max:20',
                  'passwordAgain'=>'required|same:password'
            ], 
            [
                
                'password.required'=>'Bạn chưa nhập password',
                'password.min'=>'Password ít nhất 6 ký tự',
                'password.max'=>'Password nhiều nhất 20 ký tự',
                'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
                'passwordAgain.same'=>'Mật khẩu nhập lại chưa đúng'
            ]);
            $user->password = bcrypt($request->password);
        }
        
        $user->save();
        return redirect('/profile')->with('thongbao', 'Update thành công');

    }
    

   public function dash()
   {
    
        $chart = Charts::database(User::all(),'bar', 'highcharts')
            ->Title('Users')
            ->ElementLabel("Total")
            ->Dimensions(1000, 500)    
            ->Responsive(false)
            ->lastByMonth(6, true);

        $ch = Charts::database(lesson::all(),'line', 'highcharts')
            ->Title('Lessons')
            ->ElementLabel("Total")
            ->Dimensions(1000, 500)
            
            ->Responsive(false)
            ->lastByMonth(6, true);
        return view('pages.dothi', ['chart' => $chart,'ch'=>$ch]);
   }
   
    
     
}
