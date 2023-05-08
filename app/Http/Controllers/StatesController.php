<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StatesController extends Controller
{
    // Todos os estados
    public function index(Request $r): JsonResponse {
        $states = State::all();
        return response()->json(['data' => $states]);
    }
}
