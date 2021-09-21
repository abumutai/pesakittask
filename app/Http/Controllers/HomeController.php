<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role_id!=0)
        {
            return view('fallback');
        }
        $users=User::where('role_id',1)->get();
        return view('home',compact('users'));
    }
    public function user($id)
    {
        $user=User::findOrFail($id);
        return view('user',compact('user'));
    }
}
