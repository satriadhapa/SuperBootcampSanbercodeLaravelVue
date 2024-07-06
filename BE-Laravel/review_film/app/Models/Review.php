<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory, HasUlids;
    protected $table = 'reviews';
    protected $fillable = [
        'critic', 'rating', 'user_id', 'movie_id'
    ];

    public function user()
    {
        return $this -> belongsTo(User::class, 'user_id');
    }
    public function movie()
    {
        return $this -> belongsTo(Movie::class, 'movie_id');
    }
}

