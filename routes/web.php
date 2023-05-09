<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\StatesController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

Route::get('/ping', function(): JsonResponse {
    return response()->json(['Pong'=>true]);
});

Route::get('/states', [StatesController::class, 'index']);
Route::get('/categories', [CategoriesController::class, 'index']);

Route::post('/user/signup', [UserController::class, 'signup']);
Route::post('/user/signin', [UserController::class, 'signin']);
Route::post('/user/me', [UserController::class, 'me']);

/*
* Rota de Utilidade
* [X] - /ping - Responde com pong
*
* - Rotas de configuração Geral
* [X] - /states - Listar os Estados
* [X] - /categories - Listar as categorias do sistema
* [X] - Criar as seeders para estados e categorias
*
* - Rotas de autenticação * Autenticação via TOKEN
* [] - /user/signup -- Registro do usuário
* [] - /user/signin -- Login
* [] - /user/me -- informações do usuário logado
* [] - /user/logout
*
*
* - Rotas de Advertises
* [] - /ad/list - Listar todos os anúncios
* [] - /ad/:id - Dados de um anúncio único
* [] - /ad/add - Adicionar um novo anúncio
* [] - /ad/:id(PUT) - Alterar um anúncio publicado
* [] - /ad/:id/delete - Deletar um anúncio
* [] - /ad/:id/image (Deletar a imagem de um anúncio)
*/