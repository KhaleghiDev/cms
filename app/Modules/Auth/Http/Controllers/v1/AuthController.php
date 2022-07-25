<?php

namespace Modules\Auth\Http\Controllers\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Modules\User\Entities\User;

class AuthController extends Controller
{
    public function register(Request $request){

        $post_data = $request->validate([
                'name'=>'required|string',
                'email'=>'required|string|email|unique:users',
                'password'=>'required|min:8'
        ]);

            $user = User::create([
            'name' => $post_data['name'],
            'email' => $post_data['email'],
            'password' => Hash::make($post_data['password']),
            ]);

            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            ]);
        }

        public function login(Request $request){
        if (!Auth::attempt($request->only('email', 'password'))) {
               return response()->json([
                'message' => 'اطلاعات ورودی نامعتبر می باشد '
              ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();
                $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            ]);
        }

        public function profile(Response $response){
            $profile=auth::user();
            return response()->json([
                "ststue"=>true,
                "profile"=>$profile,
            ]);
        }
login
register
logout
}
