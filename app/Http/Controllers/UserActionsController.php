<?php

namespace App\Http\Controllers;

use App\UserAction;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserActionsRequest;
use App\Http\Requests\UpdateUserActionsRequest;

class UserActionsController extends Controller
{
  
    public function index()
    {
        $user_actions = UserAction::all();

        return view('admin.user_actions.index', compact('user_actions'));
    }
}
