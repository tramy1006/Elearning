<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
class ContactController extends Controller
{
    public function index(){
    	$cate = Category::all();
        return view('contact.index',['cate'=>$cate]);
    }
}
