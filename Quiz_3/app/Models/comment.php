<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class comment extends Model
{
    use HasFactory, HasUlids;
    protected $table = 'comments';
    protected $fillable = [
        'comment','post_id'
    ];
    public $timestamps = false;
}
