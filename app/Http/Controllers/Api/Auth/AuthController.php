<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Requests\Api\Auth\UpdateProfileRequest;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\ApiTrait;
use App\Traits\ImageUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use ApiTrait , ImageUploader;
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $token = Auth::guard('api')->attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => '422',
                'message' => 'Wrong Data Please Try Again !',
            ], 401);
        }
        $user = Auth::guard('api')->user();
        $user->fcm_token = $request['fcm_token'];
        $user->save();
        return $this->responseSuccess(200 , 'Logged In Successfully!'  , [
            'user' => UserResource::make($user),
            'token' => $token
        ]);

    }

    public function register(RegisterRequest $request){
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'gender' => $request['gender'],
            'password' => Hash::make($request['password']),
            'age' => $request['age'],
            'phone_number' => $request['phone_number'],
            'type' => $request['type'],
            'fcm_token' => $request['fcm_token']
        ]);
        $token = Auth::guard('api')->login($user);
        return $this->responseSuccess(200 , 'User Created Successfully!'  , [
            'user' => UserResource::make($user),
            'token' => $token
        ]);
    }



    public function logout()
    {
        Auth::guard('api')->logout();
        return response()->json([
            'status' => 'Success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function profile(){
        return $this->responseSuccess(200 , 'Success' , ProfileResource::make(\auth('api')->user()));
    }

    public function updateProfile(UpdateProfileRequest $request){
        $user = \auth('api')->user();
        $user->update($request->validated());
        if ($request->has('image')){
            $this->uploadImage($request , 'users/avatars/' , $user , 'image');
        }
        return $this->responseSuccess(200 , 'Updated' , UserResource::make($user));
    }



    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

}
