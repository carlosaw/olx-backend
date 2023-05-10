<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\SignInRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function signup(CreateUserRequest $request): JsonResponse 
    {   // Register user in database
        $data = $request->only(['name', 'email', 'password', 'state_id']);
        $data['password'] = Hash::make($data['password']);// Encrypt password
        $user = User::create($data);

        $response = [
            'error' => '',
            // gera toekn do usuário
            'token' => $user->createToken('Resgister_token')->plainTextToken
        ];
        return response()->json($response);
        //return response()->json(['method' => 'signup']);
    }

    public function signin(SignInRequest $request): JsonResponse
    {
        $data = $request->only(['email', 'password']);

        if(Auth::attempt($data)) {
            $user = Auth::user();
            if ($user instanceof \App\Models\User) {
                $response = [
                    'error' => '',
                    'token' => $user->createToken('Login_token')->plainTextToken
                ];
                return response()->json($response);
            } else {
                // Handle Error. Not logged in or guard did not return a User object.
            }
            
        }
        return response()->json(['error' => 'Usuário e/ou Senha Inválidos!']);
    }

    public function me(Request $r): JsonResponse 
    {
        $user = Auth::user();

        $response = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'state' => $user->state->name,
            'ads' => $user->advertises
        ];
        /*
        {
            name,
            email,
            state: nome do estado,
            ads: [ad]
        }
        */
        return response()->json($response);
    }
   
}
