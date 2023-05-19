<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookCategoryRequest;
use App\Models\BookCategory;
use App\Models\User;
use Illuminate\Http\Request;

class BookCategoriesController extends Controller
{
    public function index(){
        return view('admin.categories.index' , [
            'categories' => BookCategory::all()
        ]);
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(BookCategoryRequest $request){
        try {
            BookCategory::create([
                'name' => $request['name'],
            ]);
            return to_route('categories.index')->with('message' , "Category Added !");
        }catch (\Exception $e){
            return back()->with('error' , "Something Went Wrong");
        }
    }

    public function delete($id){
        try {
            BookCategory::find($id)->delete();
            return to_route('categories.index')->with('message' , "Category Deleted !");

        }catch (\Exception $e){
            return back()->with('error' , "Something Went Wrong");

        }
    }
}
