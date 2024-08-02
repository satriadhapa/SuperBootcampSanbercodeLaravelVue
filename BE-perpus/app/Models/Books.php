<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = ['id', 'title', 'summary', 'image', 'stok', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function borrows()
    {
        return $this->hasMany(Borrows::class);
    }
}

