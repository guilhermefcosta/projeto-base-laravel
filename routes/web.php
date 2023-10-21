<?php

use Illuminate\Http\Request;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('pagina-inicial', ['name' => 'Guilherme']);
});

Route::get('/guilherme', function () {
    return view('pagina-inicial')
                ->with('name', 'Aloha');
});

Route::middleware(['throttle:login'])->group(function () {
    Route::post('/login', function(Request $request) {
        
    });

});


/* A tela só aparece quando as condicoes sao atendidas dos paramentros */
// Route::get('/user/{id}/{name}', function (string $id, string $name) {
//     // ...
// })->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

/* A mesma situaacao da de cima, mas sem a necessidade de inserir regex */
// Route::get('/user/{id}/{name}', function (string $id, string $name) {
//     // ...
// })->whereNumber('id')->whereAlpha('name');

// /* Parametro ja delimitado */
// Route::get('/category/{category}', function (string $category) {
//     // ...
// })->whereIn('category', ['movie', 'song', 'painting']);


// Route::get('/greeting', function () {
//     return 'Hello World';
// });

// Route::view('/hello', 'teste');

// Route::match(['get', 'post'], '/teste', function() {
//     return 'teste';
// });

// Route::any('/cabeca', function() {
//     return 'cabecao';
// });

// Route::redirect('/globo', '/');

