<?php

use App\Http\Controllers\MovimentoController;
use App\Models\Movimento;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* As rotas definem que recurso será carregado
quando uma URL for digitada. Pode carregar
um Controller ou uma View. Quando uma
URL precisar carregar dados do BD 
a rota deve carregar um CONTROLLER */
Route::get('/', function () {
    return view('auth.login');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',[MovimentoController::class,'read'])->name('dashboard');
    //a rota abaixo recebe um parâmetro dinâmico chamado {id}
    Route::get('/form_update/{id}',[MovimentoController::class,'form_update'])->name('form_update');
    Route::get('/nova_entrada', function(){
        return view('nova_entrada');
    })->name('nova_entrada');
    Route::post('/store', [MovimentoController::class,'store'])->name('store');
    Route::put('/update', [MovimentoController::class,'update'])->name('update');
    Route::delete('/deletar/{id}', [MovimentoController::class,'deletar'])->name('deletar');
});
