<?php

namespace App\Http\Controllers\Api;

use App\Enums\SkillsName;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Skills;
use App\Models\User;
use App\Models\UserSkills;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function register(RegisterRequest $request): JsonResponse
    {

        $user = User::create($request->validated());

        return response()->json(
            [
                'message' => 'Registered new user',
                'status' => Response::HTTP_CREATED,
                'data' => $user,
            ]);
    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if(!Auth::attempt($credentials))
        {
            return response()->json([
                'code' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'status' => false,
                'message' => 'Invalid credentials']);
        }

        $user = User::firstWhere(['email' => $credentials['email']]);
        $token = $user->createToken('Customer '.  $user->name)->plainTextToken;

        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => "Successfully logged in",
            'token' => $token,
        ]);
    }
    public function logout()
    {
        Auth::user()->tokens()->delete();

        return response()->json(['message' => 'Logged out successfully']);
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
