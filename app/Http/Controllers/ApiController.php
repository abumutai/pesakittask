<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\User as ResourcesUser;

class ApiController extends Controller
{
    //Register user
    public function register(Request $request)
    {
        $data=Validator::make($request->all(),[
            'name'=>'required|string',
            'email'=>'required|email|unique:users',
            'phone'=>'required|numeric|min:10',
            'password'=>'required|min:8|confirmed'
        ]);

        if($data->fails())
        {
            return response()->json([$data->errors()]);
        }

        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->password=Hash::make($request->password);
        $user->api_token=Str::random(80);//Api token for authenticating users
        if($user->save())
        {
            return new ResourcesUser($user);
        }
    }

    //Login user
    public function login(Request $request)
    {
        $data = Validator::make($request->all(),[
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8']
        ]);

        if($data->fails())
        {
            return response()->json([$data->errors()]);
        }

        if (Auth::attempt(['email' => $request->input('email'), 
            'password' => $request->input('password')])) 
        {
            $user = auth()->guard('web')->user();
            return new ResourcesUser($user);
        }
        else{
            return response()->json('Details could not match our credentials.');
        }
    }
    //User profile details
    public function profile($id)
    {
        $user=User::find($id);
        if(!$user)
        {
            return response()->json('User not found!.');
        }
        else{
            return new ResourcesUser($user);
        }
    }
}
