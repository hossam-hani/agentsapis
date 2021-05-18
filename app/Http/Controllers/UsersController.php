<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;
use App\Models\NotifcationToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class UsersController extends Controller
{   

    public function get_notifications(Request $request){
        $user = Auth::user();
        return Notification::where('user_id',$user->id)->paginate(30);
    }
  
    public function save_notification_token(Request $request){
        $user = Auth::user();

        $validateData = $request->validate([
            'token' => 'required',
        ]);


        return NotifcationToken::create([
            'user_id'=> $user->id,
            'token' => $validateData['token']
        ]);
    }
    public function register(Request $request){ 
        
        $validateData = $request->validate([
            'email' => 'required|max:255',
            'name' => 'required|max:50',
            'password' => 'required|max:16',
        ]);

        $user = User::create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => $validateData['password'],
        ]);

        $access_token = $user->createToken('authToken')->accessToken;

        return response(['user' => $user, 'access_token' => $access_token]);
    }

    public function login(Request $request){
        
        $loginData = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        if(!auth()->attempt($loginData)){
            return response(['message' => 'invalid credentials'], 401);
        }

        $access_token = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' =>  auth()->user(), 'access_token' => $access_token]);
    }

    
}
