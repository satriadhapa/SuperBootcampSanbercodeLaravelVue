<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Symfony\Component\HttpKernel\Profiler\Profile;
use App\Models\Profil;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable Implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids;


    public static function boot()
    {
        parent::boot();
        static::created(function ($model){
            $model->generateOtpCode();
        });
    }
    
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
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
            $randomNumber = mt_rand(100000,999999);
            $checkOtpCode = OtpCode::where('otp', $randomNumber)->first();
        } while ($checkOtpCode);
        $now = Carbon::now();
        // $currentUser = auth()->user();
        $otp_code = OtpCode::updateOrCreate(
            ["user_id"=> $this->id],
            [
                'otp'=> $randomNumber,
                'valid_until'=> $now-> addMinute(5)
            ]
        );
        return response()->json([
            "data" => "Otp code sudah di generate"
        ]);
    }   
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
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
}
