<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function my_books()
    {
        return $this->hasMany(MyBook::class,'book_id');
    }

    public function books()
    {
        // return $this->hasManyThrough(Book::class, MyBook::class,'id');
        return $this->hasManyThrough(
            Book::class,
            MyBook::class,
            'user_id', // Foreign key on the types table...
            'my_book_id', // Foreign key on the items table...
            'id', // Local key on the users table...
            'id' // Local key on the categories table...
     );
    }
}
