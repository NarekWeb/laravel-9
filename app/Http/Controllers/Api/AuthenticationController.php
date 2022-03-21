<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRecuest;
use App\Http\Requests\LoginUserRecuest;
use App\Http\Services\UserService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    //this method adds new users
    public function createAccount(CreateUserRecuest $request)
    {
        $user = $this->userService->create($request);

        return response()->json([
            'token' => $user->createToken('tokens')->plainTextToken
        ], 200);
    }

    //use this method to signin users
    public function login(LoginUserRecuest $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return $this->error('Credentials not match', 401);
        }

        return response()->json([
            'token' => auth()->user()->createToken('API Token')->plainTextToken
        ], 200);
    }

    // this method signs out users by removing tokens
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'Tokens Revoked'
        ], 200);
    }
}
