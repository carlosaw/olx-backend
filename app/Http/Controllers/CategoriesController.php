<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    // Todos as categorias
    public function index(Request $r): JsonResponse {
        $categories = Category::all();
        return response()->json(['data' => $categories]);
    }
}
