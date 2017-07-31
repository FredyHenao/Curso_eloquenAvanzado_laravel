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

use eloquenAvance\Page;

//introduccion-y-primeros-pasos video 1
Route::get('/', function () {
    $books = eloquenAvance\Book::get();
    return view('destroy', compact('books'));
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

//eliminar varios registros a la ves
Route::delete('destroy',function (Illuminate\Http\Request $request){
    $ids = $request->get('ids');

    if(count($ids)){
        eloquenAvance\Book::destroy($ids);
    }
    return back();
});

//consultar todas las categorias
Route::get('categorias', function () {
    //el metodo has sirve para traer datos de relaciones mientras exista algo relacionado con el
    $categories = eloquenAvance\Category::has('books')->get();
    return view('relationship', compact('categories'));
});

//consultar todos los libros que tengan todos los estados en public de cada categoria
Route::get('categorias_books', function () {
    //el metodo whereHas con el cual añadimos restricciones personalizadas, ordenamos resultados y básicamente una consulta completa en una tabla relacionada
    $categories = eloquenAvance\Category::whereHas('books',function ($query){
        $query->where('status','public');
    })->get();
    return view('relationship', compact('categories'));
});

//relación de muchos a muchos
//en las relaciones de muchos a muchos se crea una tabla intermedia que se llaman tablas pivotes, a la hora de nombrarl se debe poner en singular y en orden alfabetico
Route::get('manytomany',function (){
    $users = \eloquenAvance\User::all();
    return view('manytomany.manytomany', compact('users'));
});

Route::get('edit-manytomany/{user_id}',[
    'as' => 'getEdit',
    'uses' => 'UserController@getEditManyToMany'
]);

Route::put('put-manytomany/{user_id}',[
    'as' => 'putEdit',
    'uses' => 'UserController@putEditManyToMany'
]);

//query builder
Route::get('querybuilder',function (){
    $books = DB::table('categories')
        ->join('books','categories.id','=', 'books.category_id')
        ->select('categories.*','books.*')
        ->get();
   return view('querybuilder.index', compact('books'));
});

//relación de muchos a muchos con campos adicionales
Route::get('manytomanymax',function (){
    $user = \eloquenAvance\User::find(1);
    echo $user->name;
    foreach ($user->exams as $exam){
        echo '<li>'
            .$exam->title
            .' Nota '.$exam->pivot->score
            .' Fecha '.$exam->pivot->created_at
            .'</li>';
    }
});

//problema n+1  carga ambiciosa(se hace la consulta y se envia a la vista) y ligera (si se hace la consulta desde la vista)
Route::get('home',function (){
   $books = \eloquenAvance\Book::with('category','users')->get();
   return view('home', compact('books'));
});

//relaciones polimorficas
Route::get('poli', function (){
   $page = Page::find(6);
   echo $page->name;

   foreach ($page->comments as $comment){
        echo '<li>'. $comment->body .'</li>';
   }
});