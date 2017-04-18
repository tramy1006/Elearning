<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Slide;
use Cloudder;
use DB;
class SlideController extends Controller
{
    public function getlist()
    {
    	$slide = Slide::paginate(3);
        $slides = DB::table('slide')->count();
    	return view('slide.index',['slide'=>$slide,'slides'=>$slides]);
    }
    public function getAdd()
    {
    	
    	return view('slide.add');
    }
    public function postAdd(Request $request)
    {
    	$this->validate($request, 
    		[
    			'name' =>'required'

    		],  
    		[
    		'name.required'=> 'Bạn chưa nhập tên Slide'
    		]);
    	$slide= new Slide;
    	$slide->name = $request->name;
    	if($request->hasFile('hinh'))
    	{
    		$filename = $request->hinh;
            Cloudder::upload($filename,'khoaluan/' . $slide->name);
            $slide->hinh = Cloudder::getResult()['url'];
    	}

    	$slide->save();
        return redirect('slide/list')->with('thongbao', 'Thêm hình thành công');
    }
    public function getDelete($id)
    {
    	$slide = Slide::find($id);
    	$slide->delete();
    	return redirect('slide/list')->with('thongbao','Xóa thành công');
    }
    public function getEdit($id)
    {
    	$slide=Slide::find($id);
    	return view('slide.edit', ['slide'=>$slide]);
    }
    public function postEdit(Request $request, $id)
    {
    	$slide= Slide::find($id);
        Cloudder::destroyImage('khoaluan/'. $slide->name);
    	$this->validate($request,
    		[
    			'name'=>'required|unique:Slide,name'
    		],
    		[
    			'name.required'=>'Bạn chưa nhập tên',
    			'name.unique'=>'Tên đã tồn tại'
    		]);

    	$slide->name=$request->name;

    	if($request->hasFile('hinh'))
    	{
            
            
    		$filename = $request->hinh;
            Cloudder::upload($filename,'khoaluan/' . $slide->name);
            $slide->hinh = Cloudder::getResult()['url'];
            
    	}
    	$slide->save();

    	return redirect('slide/list')->with('thongbao','Sửa thành công');

    }
     public function destroy(Request $request)
    {
        $this->validate($request, [
            'checked' => 'required',
        ]);

        $checked = $request->input('checked');

        Slide::destroy($checked);
        return redirect('/slide/list')->with('thongbao','xóa thành công');
    }
}
