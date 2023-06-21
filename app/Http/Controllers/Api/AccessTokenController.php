<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\User ;
use Illuminate\Support\Facades\Hash;
use Response;
use Auth ;
use Laravel\Sanctum\PersonalAccessToken;


class AccessTokenController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'email' => 'required|email|max:255' ,
            'password' =>'required|string|min:6' ,
            'device_name' =>'string|max:255'
        ]);

        $user = User::where('email' , $request->email)->first();

        if($user && Hash::check($request->password , $user->password)){
            $device_name = $request->post('device_name' , $request->userAgent());
            $token = $user->createToken($device_name);

            return Response::json([
                'code' => 1 ,
                'token' =>$token->plainTextToken ,
                'user' => $user ,
            ] , 201);
        }
        return Response::json([
            'code' => 0 ,
            'message' =>'error' ,
        ] , 401);
    }

    public function destroy($token = null){
        $user = Auth::guard('sanctum')->user();

        if(null === $token){
            $user->currentAccessToken()->delete();
            return ;
        }

        $personalAcessToken = PersonalAccessToken::findToken($token);
        if(
            $user->id == $personalAcessToken->tokenable_id
            && get_class($user) == $personalAcessToken->tokenable_type
        ){

            $personalAcessToken->delete();
        }
    }

}
