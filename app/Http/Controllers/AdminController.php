<?php

namespace App\Http\Controllers;

use App\Form;
use App\User;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.overview')->with('users', $users);
    }

    public function all_user_forms($id)
    {
        $forms = Form::where('user_id', $id)->get();
        $user = Auth::user();
//        return json_encode($user);
        return view('forms.overview')->with(['forms' => $forms, 'user' => $user]);
    }
}
