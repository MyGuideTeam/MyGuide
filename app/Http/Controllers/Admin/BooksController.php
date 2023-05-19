<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\AudioBook;
use App\Models\BookCategory;
use App\Traits\ImageUploader;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    use ImageUploader;
    public function index(){
        return view('admin.books.index' , [
            'books' => AudioBook::paginate(25)
        ]);
    }

    public function create(){
        return view('admin.books.create' , [
            'categories' => BookCategory::all()
        ]);
    }

    public function store(BookRequest $request){
        try {
            $book = AudioBook::create([
                'title' => $request['title'],
                'author' => $request['author'],
                'publish_year' => $request['publish_year'],
                'description' => $request['description'],
                'category_id' => $request['category_id']
            ]);
            if ($request->has('image'))
                $this->uploadImage($request , 'books/' , $book , 'image');
            if ($request->has('audio_file'))
                $this->uploadImage($request , 'books/' , $book , 'audio_file' , 'audio_file');
            return to_route('books.index')->with('message' , "Book Added !");
        }catch (\Exception $e){
            return back()->with('error' , "Something Went Wrong");
        }
    }

    public function edit($id){
        return view('admin.books.edit' , [
            'book' => AudioBook::find($id),
            'categories' => BookCategory::all()
        ]);
    }

    public function update(BookRequest $request , $id){
        try {
            $book = AudioBook::find($id);
            $book->update([
                'title' => $request['title'],
                'author' => $request['author'],
                'publish_year' => $request['publish_year'],
                'description' => $request['description'],
                'category_id' => $request['category_id']
            ]);

            if ($request->has('image'))
                $this->uploadImage($request , 'books/' , $book , 'image');
            if ($request->has('audio_file'))
                $this->uploadImage($request , 'books/' , $book , 'audio_file');
            return to_route('books.index')->with('message' , "Book Updated !");
        }catch (\Exception $e){
            return back()->with('error' , "Something Went Wrong");
        }
    }

    public function delete($id){
        try {
            AudioBook::find($id)->delete();
            return to_route('books.index')->with('message' , "Book Deleted !");
        }catch (\Exception $e){
            return back()->with('error' , "Something Went Wrong");
        }
    }
}
