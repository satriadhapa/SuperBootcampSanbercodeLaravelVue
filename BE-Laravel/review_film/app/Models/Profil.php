<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory, HasUlids;
    protected $table = 'profiles';
    protected $fillable = ['age', 'biodata', 'address','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}