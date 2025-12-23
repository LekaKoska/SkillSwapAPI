<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSkillRequest;
use App\Models\Skills;
use App\Models\User;
use App\Models\UserSkills;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SkillsController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'status' => true,
            'data' => Skills::paginate()
        ], status: Response::HTTP_OK);

    }
    public function add(UserSkillRequest $request): JsonResponse
    {
       $newSkill = UserSkills::create($request->validated());

       return response()->json(
           [
               'status' => true,
               'message' => 'Added new skill',
               'data' => $newSkill
           ], status: Response::HTTP_CREATED);
    }
}
