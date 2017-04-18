<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UpdateUserRequest;
use Auth;
use DB;
use App\User;
use Image;
class UserController extends Controller
{
    public function getAdmin()
    {
        return view('layouts.ad');
    }
    
    public function users()
    {
        if(Auth::user()->role == 0)
        {
            return redirect('/');
        }
        $user = DB::table('users')->count();
        $users = DB::table('users')->orderBy('id','DESC')->get();
        $users = User::paginate(5);
        return view('admin.user', ['user'=>$user],compact('users'));
    }
    public function updateRole( Request $request, User $user)
    {
        $user->update($request->all());
        return redirect('/users');
    }
    public function getDelete($id)
    {
        $user = User::find($id);

        $user->delete();
        return redirect('/users');
    }
     public function destroy(Request $request)
    {
        $this->validate($request, [
            'checked' => 'required',
        ]);

        $checked = $request->input('checked');

        User::destroy($checked);
        return redirect('/users')->with('thongbao','xóa thành công');
    }
    
 }
