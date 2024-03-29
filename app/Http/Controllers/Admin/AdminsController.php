<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use App\Traits\ImageUploader;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
    use ImageUploader; 
    public function index(){
        return view('admin.Accounts.admins.index' , [
            'admins' => Admin::orderBy('role')->paginate(25)
        ]);
        //test
    }

    public function create(){
        return view('admin.Accounts.admins.create');
    }

    public function store(AddAdminRequest $request){
        try {
            $admin = Admin::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'role' => 0
            ]);
            if ($request->has('image'))
                $this->uploadImage($request , 'admin/' , $admin , 'image');
            return to_route('admins.index')->with('message' , "Admin Added !");
        }catch (\Exception $e){
            return back()->with('error' , "Something Went Wrong");
        }
    }

    public function edit($id){
        return view('admin.Accounts.admins.edit' , [
            'admin' => Admin::find($id)
        ]);
    }

    public function update(UpdateAdminRequest $request , $id){
        try {
            $admin = Admin::find($id);
            $password = $admin->password;
            if ($request->password)
                $password = Hash::make($request->password);
            $admin->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => $password,
            ]);

            if ($request->has('image'))
                $this->uploadImage($request , 'admin/' , $admin , 'image');
            return to_route('admins.index')->with('message' , "Admin Updated !");
        }catch (\Exception $e){
            return back()->with('error' , "Something Went Wrong");
        }
    }

    public function delete($id){
        try {
            Admin::find($id)->delete();
            return to_route('admins.index')->with('message' , "Admin Deleted !");

        }catch (\Exception $e){
            return back()->with('error' , "Something Went Wrong");

        }
    }
}
