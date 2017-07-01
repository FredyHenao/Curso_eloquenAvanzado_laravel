<?php

namespace eloquenAvance;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //el metodo siempre se pone en plural
    //relacion hasmany
    public function books(){
        return $this->hasMany(Book::class);
    }
    public function getNumBooksAttribute(){
        return count($this->books);
    }

    public function getNumBooksPublicAttribute(){
        return count($this->books->where('status','public'));
    }

    public function getBooksPublicAttribute(){
        return $this->books->where('status','public');
    }
}
