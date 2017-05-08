<?php

namespace App\Http\Controllers;

use Auth;
use App\Test;
use App\TestAnswer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreResultsRequest;
use App\Http\Requests\UpdateResultsRequest;
use DB;
class ResultsController extends Controller
{

    public function index()
    {
        
        $results = Test::all()->load('user');
        if(!Auth::user()->role == 0) {
            $results = $results->where('user_id', '=', Auth::id());
    
        }
       
        return view('admin.results.index', compact('results'));
    }

    public function show($id)
    {
        $test = Test::find($id)->load('user');

        if ($test) {
            $results = TestAnswer::where('test_id', $id)
                ->with('question')
                ->with('question.options')
                ->get()
            ;
        }

        return view('admin.results.show', compact('test', 'results'));
    }
}
