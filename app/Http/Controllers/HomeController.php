<?php

namespace App\Http\Controllers;

use App\User;
use App\UserRole;
use App\Role;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user_role = UserRole::where('role_id','=','1')->get();
        return view('dashboard', compact('user_role',$user_role));
    }
}
