<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BooksResource;
use App\Http\Resources\CategoryResource;
use App\Models\AudioBook;
use App\Models\BookCategory;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    use ApiTrait;

    public function index(){
        $categories = BookCategory::all();
        return $this->responseSuccess(200 , 'Categories Returned Successfully !' , CategoryResource::collection($categories));
    }


    public function show($id){
        $book = AudioBook::find($id);
        return $this->responseSuccess(200, 'Books Returned Successfully ', BooksResource::make($book));
    }



}
