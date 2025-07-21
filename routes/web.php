<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { // Route da main page
    return view('index', [
        'name' => 'Bruno'
    ]);
});

Route::get('/hello', function () { // Página que diz hello world
    return 'Hello World!';
})->name('/world'); // definindo nome 'world' para route /hello

Route::get('/hallo', function () { // página que redireciona para a /hello
    return redirect()->route('/world'); // redirecionando para route apelidada 'world' (vulgo a /hello)
});

Route::get('/oi/{name}', function ($name) { // página que da oi com variavel dinamica
    return 'Eai meu mano ' . $name;
});

Route::fallback(function () { // página 404 (fallback)
    return 'Página 404 brother';
});
