<?php

namespace eloquenAvance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    //el nombre se pone en singular
    //belongsto siginifica pertenece a ejemplo pertenece a category
    public function category (){
        return $this->belongsTo(Category::class);
    }
}
