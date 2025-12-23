<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(RegisterRequest $request): JsonResponse
    {

        $user = User::create($request->validated());

        return response()->json(
            [
                'status' => true,
                'message' => 'Registered new user',
                'data' => $user,
            ], status: Response::HTTP_CREATED);
    }
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = $request->validated();

        if(!Auth::attempt($credentials))
        {
            return response()->json([
                'status' => false,
                'message' => 'Invalid credentials'
            ], status: Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user = User::firstWhere(['email' => $credentials['email']]);
        $token = $user->createToken('Customer '.  $user->name)->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => "Successfully logged in",
            'token' => $token,
        ], status: Response::HTTP_OK);
    }
    public function logout(): JsonResponse
    {
        Auth::user()->tokens()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Logged out successfully'
        ], status: Response::HTTP_OK);
    }

   public function bio(UpdateProfileRequest $request): JsonResponse
   {
       $user = auth()->user();
       $user->update($request->validated());

       return response()->json([
           'status' => true,
           'message' => 'Updated profile bio',
       ], status: Response::HTTP_OK);
   }
}
