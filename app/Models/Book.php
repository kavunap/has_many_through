<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','my_book_id',
    ];

    public function my_books()
    {
        return $this->hasMany(MyBook::class);
    }

    public function users()
    {
        return $this->hasManyThrough(User::class, MyBook::class);
    }
}
