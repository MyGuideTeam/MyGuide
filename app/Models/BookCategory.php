<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function books(){
        return $this->hasMany(AudioBook::class , 'category_id');
    }
}
