<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;

    protected static function boot()
    {
        parent::boot();
        static::created(function ($model) {
            $model->generateOtpCode();
        });
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function generateOtpCode()
    {
        do {
            $randomNumber = mt_rand(100000, 999999);
            $checkOtpCode = OtpCode::where('otp', $randomNumber)->first();
        } while ($checkOtpCode);

        $now = Carbon::now();
        OtpCode::updateOrCreate(
            ["user_id" => $this->id],
            [
                'otp' => $randomNumber,
                'valid_until' => $now->addMinute(5)
            ]
        );

        return response()->json([
            "data" => "Otp code sudah di generate"
        ]);
    }   

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function profile()
    {
        return $this->hasOne(Profil::class, 'user_id');
    }

    public function otpcode()
    {
        return $this->hasOne(OtpCode::class, 'user_id');
    }

    public function role()
    {
        return $this->belongsTo(Roles::class);
    }
}
