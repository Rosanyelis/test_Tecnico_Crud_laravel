<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [TareaController::class, 'index']);
Route::get('/tareas/nueva-tarea', [TareaController::class, 'create']);
Route::post('/tareas/guardar-tarea', [TareaController::class, 'store']);
Route::get('/tareas/{id}/ver-tarea', [TareaController::class, 'show']);
Route::get('/tareas/{id}/editar-tarea', [TareaController::class, 'edit']);
Route::put('/tareas/{id}/actualizar-tarea', [TareaController::class, 'update']);
Route::delete('/tareas/{id}/eliminar-tarea', [TareaController::class, 'destroy']);