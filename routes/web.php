<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfessorController;
use App\Models\Professor;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/exer1', function () {
    return view('exer1');
});

Route::post('/exer1', function (Request $request) {
    $valor = $request->input('valor');

    if ($valor > 0) {
        return "Valor positivo";
    }
    else if ($valor == 0) {
        return "Igual a zero";
    }
    else {
        return "Valor negativo";
    }
});

Route::get('/exer2', function () {
    return view('exer2');
});

Route::post('/exer2', function (Request $request) {
    $valor1 = $request->input('valor1');
    $valor2 = $request->input('valor2');
    

    if ($valor1 == $valor2) {
        return 3 * $valor1;
    }
    return $valor1 + $valor2;

});

// entre chaves significa que tá passando variável
Route::get('/mensagem/{mensagem}', [HomeController::class, 'mostrarMensagem']);
// [array -> 0 é a classe, 1 é o método]


Route::resources([
    'professor' => ProfessorController::class,
    #produtos => ProdutosController::class
]);

Route::get('/professor/{id}/delete', [ProfessorController::class, 'delete']);