<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureTokenIsValid;
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
    // return view('pagina-inicial', ['name' => 'Guilherme']);
    return response()->file('../storage/files/pdf.pdf'); // mostra o conteudo no browser
    // return response()->download('../storage/files/pdf.pdf', 'booking.pdf'); // faz o download do arquivo
});

/* Retorna uma string de como arquivo gerado na hora */
Route::get('/@baixando-arquivo-nao-salvo', function() {
    return response()->streamDownload(function () {
        echo "Fala comigo cara de tabaco";
    }, 'laravel-readme.md');
});


/* Agrupado com um middleware */
Route::middleware([EnsureTokenIsValid::class])->group(function() {
    Route::get('/teste', function () {
        return view('teste');
    });

});

Route::get('/guilherme', function () {
    return view('pagina-inicial')
                ->with('name', 'AlohaAA');
});

Route::get('/panic', function () {
    return view('panic');
});

/* Rota de login com limite de quisicoes */
Route::middleware(['throttle:login'])->group(function () {
    Route::get('/login', function(Request $request) {
        return "aaaa";
    })->name('login');
});



/* Chama a action show do controller UserController */
Route::get('/user/profile', [UserController::class, 'show']);


Route::get('/beach', function(Request $request) {
    // echo url()->full();
    return url()->previous(); // url anterior
});

/* Cria uma rota para cada photo action no controller PhotoController (olhar na docs)*/
Route::resource('photos', PhotoController::class);



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

