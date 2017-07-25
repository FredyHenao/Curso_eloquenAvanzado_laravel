<?php

namespace eloquenAvance\Http\Controllers;

use Illuminate\Http\Request;
use eloquenAvance\User;
use eloquenAvance\Book;

class UserController extends Controller
{
    public function getEditManyToMany($user_id){
        $user = User::find($user_id);
        $books = Book::orderBy('title','ASC')->pluck('title','id');
        return view('manytomany.edit',compact('user','books'));
    }

    public function putEditManyToMany(Request $request, $user_id){
        $user = User::find($user_id);
        $user->manyBooks()->sync($request->get('books'));
        return redirect('manytomany');
    }
}
