<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user() != null){
            $user = Auth::user();
            return view('home', ['user' => $user]);
        }

        elseif(is_mobile()){
            return view('appDownload');
        }

        else{
            return view('home');
        }
    }

    public function cookies(){
        $data = Storage::disk('local')->get('cookies.txt');
        return view('cookies')->with('data', $data);
    }
}
