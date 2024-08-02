<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory,HasUuids;
    
    public $incrementing = false;
    protected $table = 'roles';

    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

