<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.overview')->with('users', $users);
    }
}
