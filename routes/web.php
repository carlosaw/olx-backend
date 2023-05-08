<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\StatesController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

Route::get('/ping', function(): JsonResponse {
    return response()->json(['Pong'=>true]);
});

Route::get('/states', [StatesController::class, 'index']);
Route::get('/categories', [CategoriesController::class, 'index']);

/*
* Rota de Utilidade
* [] - /ping - Responde com pong
*
* - Rotas de configuração Geral
* [] - /states - Listar os Estados
* [] - /categories - Listar as categorias do sistema
*
* - Rotas de autenticação * Autenticação via TOKEN
* [] - /user/signin -- Login
* [] - /user/signup -- Registro do usuário
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