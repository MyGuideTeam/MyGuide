<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BooksResource;
use App\Models\AudioBook;
use App\Traits\ApiTrait;

class BooksController extends Controller
{
    use ApiTrait;



    public function show($id){
        $book = AudioBook::findOrFail($id);
        return $this->responseSuccess(200, 'Books Returned Successfully ', BooksResource::make($book));
    }



}
