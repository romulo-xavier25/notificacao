<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\NotificacaoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/home', [HomeController::class, 'home'])->name('home');
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/show/{id:}', [PostController::class, 'show'])->name('posts.show');
Route::post('/comentario', [ComentarioController::class, 'store'])->name('comentario.store');
Route::get('/notificacoes', [NotificacaoController::class, 'notificacoes'])->name('notificacoes');
Route::put('/notificacoes-lida', [NotificacaoController::class, 'marcarComoLido']);
Route::put('/todas-notificacoes-lida', [NotificacaoController::class, 'marcarTodasComoLidas']);



