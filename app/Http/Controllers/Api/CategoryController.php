<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BooksResource;
use App\Http\Resources\CategoryResource;
use App\Models\BookCategory;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use ApiTrait;

    public function index()
    {
        $categories = BookCategory::all();
        return $this->responseSuccess(200, 'Categories Returned Successfully !', CategoryResource::collection($categories));
    }


    public function getBooks($id)
    {
        $category = BookCategory::findOrFail($id);
        return $this->responseSuccess(200, 'Books Returned Successfully ', BooksResource::collection($category->books));
    }
}
