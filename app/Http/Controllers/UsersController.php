<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddAdminRequest;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use App\Models\User;
use App\Traits\ImageUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    use ImageUploader;
    public function index(){
        return view('admin.Accounts.users.index' , [
            'users' => User::paginate(25)
        ]);
    }

    public function create(){
        return view('admin.Accounts.users.create');
    }

    public function store(UserRequest $request){
        try {
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'type' => $request['type'],
                'phone_number' => $request['phone_number'],
                'gender' => $request['gender'],
                'age' => $request['age']
            ]);
            if ($request->has('image'))
                $this->uploadImage($request , 'users/' , $user , 'image');
            return to_route('users.index')->with('message' , "User Added !");
        }catch (\Exception $e){
            return back()->with('error' , "Something Went Wrong");
        }
    }

    public function edit($id){
        return view('admin.Accounts.users.edit' , [
            'user' => User::find($id)
        ]);
    }

    public function update(UserRequest $request , $id){
        try {
            $user = User::find($id);
            $password = $user->password;
            if ($request->password)
                $password = Hash::make($request->password);
            $user->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'gender' => $request['gender'],
                'phone_number' => $request['phone_number'],
                'type' => $request['type'],
                'password' => $password,
            ]);

            if ($request->has('image'))
                $this->uploadImage($request , 'users/' , $user , 'image');
            return to_route('users.index')->with('message' , "User Updated !");
        }catch (\Exception $e){
            return back()->with('error' , "Something Went Wrong");
        }
    }

    public function delete($id){
        try {
            User::find($id)->delete();
            return to_route('users.index')->with('message' , "User Deleted !");

        }catch (\Exception $e){
            return back()->with('error' , "Something Went Wrong");
        }
    }
}
