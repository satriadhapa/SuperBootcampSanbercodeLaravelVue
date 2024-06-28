<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $roleUser = Roles::where('name','user')->first();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $roleUser
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'message' => 'register berhasil',
            'user' => $user,
            'token' => $token
        ]);
    }

    public function getUser()
    {
        $currentUser = auth()->user();
        return response()->json([
            'message' => 'Berhasil get user',
            'user' => $currentUser
        ]);
    }
    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);

        if (! $user = auth()->attempt($credentials)) {
            return response()->json([
                'message' => 'user invalid'], 401);
        }
        $userData = User::where('email', $request['email'])->first();
        $token = JWTAuth::fromUser($userData);
        return response()->json([
            'user' => $userData,
            'token' => $token
        ]);

    }
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
