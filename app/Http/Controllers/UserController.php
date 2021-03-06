<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function register(Request $request)
   {
    
        $validatedData = $request->validate([
            'name'=>'required|max:55',
            'email'=>'email|required',
            'password'=>'required'
        ]);

        $validatedData['password'] = bcrypt($request->password);

        $user = User::create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user'=> $user, 'access_token'=> $accessToken]);
       

        }

   public function login(Request $request)
   {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
       
        if(!auth()->attempt($loginData)) {
            return response()->json(['message'=>'Invalid credentials'] , 403);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return auth()->user();

   }
}

