<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function signup(CreateUserRequest $request): JsonResponse 
    {   // Register user in database
        $data = $request->only(['name', 'email', 'password', 'state_id']);
        $user = User::create($data);
        return response()->json($user);
        //return response()->json(['method' => 'signup']);
    }

    public function signin(): JsonResponse 
    {
        return response()->json(['method' => 'signin']);
    }

    public function me(): JsonResponse 
    {
        return response()->json(['method' => 'me']);
    }
   
}
