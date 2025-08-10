<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->get()
    ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

// pelo o que entendi, o collect converte o array em um collection object do laravel
// $task = collect($tasks)->firstWhere('id', $id);
// o firstWhere pega o primeiro item que bater o valor com a key
Route::get('/tasks/{id}', function ($id) {
    // find() busca pela chave primaria da classe chamada. Ex: Task::find($id)
    return view('show', ['task' => Task::findOrFail($id)]);
})->name('tasks.show');

Route::post('/tasks', function (Request $request) {
    $data = $request->validate([ // Valida os campos da requisição conforme as regras definidas
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',
    ]);

    $task = new Task; // Cria instância da classe Task e adiciona aos atributos da classe seus respectivos novos valores
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save(); // Salva nova task na tabela Task

    return redirect()->route('tasks.show', ['id' => $task->id])
        ->with('success', 'Task created successfully!');
})->name('tasks.store');

// Route::get('/xxx', function () {
//     return 'Hello';
// })->name('hello');

// Route::get('/hallo', function () {
//     return redirect()->route('hello');
// });

// Route::get('/greet/{name}', function ($name) {
//     return 'Hello ' . $name . '!';
// });

Route::fallback(function () {
    return 'Still got somewhere!';
});
