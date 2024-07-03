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
        // $this->middleware('auth:api', ['except' => ['login']]);
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
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
            'role_id' => $roleUser->id
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

        if (!$token = auth()->attempt($credentials)) {
            return response()->json([
                'message' => 'user invalid'], 401);
        }
        $Userdata = User::where('email', $request['email'])->first();
        $token = JWTAuth::fromUser($Userdata);
        return response()->json([
            'user' => $Userdata,
            'token' => $token
        ]);
    
    }
    public function updateUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $currentUser = auth()->user();
        $userid =User::find($currentUser->id);
        $userid ->name = $request['name'];
        $userid->save([
            "name" => $request['name']
        ]);

        return response()->json([
            "message" => "berhasil"
        ]);
    }
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }


}
