<?php

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

//introduccion-y-primeros-pasos video 1
Route::get('/', function () {
    return eloquenAvance\Book::all();
});

Route::get('delete/{id}', function ($id) {
    $book = eloquenAvance\Book::find($id);
    $book->delete();
    return "eliminado correctamente";
});

//mostrar registro en papelera
Route::get('enpapelera/{id}', function ($id) {
    $book = eloquenAvance\Book::withTrashed()->find($id);
    return $book;
});
//mostrar todos los registros incluyendo los enviados a papelera
Route::get('registros_con_papelera', function () {
    $book = eloquenAvance\Book::withTrashed()->get();
    return $book;
});
//Restaurar un registro de papelera
Route::get('restaurar/{id}', function ($id) {
    $book = eloquenAvance\Book::withTrashed()->find($id);
    $book->restore();
    return "Registro restaurado correctamente";
});

//Eliminar un registro definitivamente (fisico)
Route::get('eliminarfin/{id}', function ($id) {
    $book = eloquenAvance\Book::withTrashed()->find($id);
    $book->forceDelete();
    return "Registro eliminado correctamente";
});