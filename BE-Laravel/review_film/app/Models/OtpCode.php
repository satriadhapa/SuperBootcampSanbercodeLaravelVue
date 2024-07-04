<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtpCode extends Model
{
    use HasFactory, HasUlids;
    protected $table = "otp_codes";
    protected $fillable = ["otp", "user_id", "valid_until"];
}
