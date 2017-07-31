<?php

namespace eloquenAvance;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','body'];

    public function comments()
    {
        //relaciones polimorficas tiene muchos comentarios  morphMany('entidad','metodo a utilizar ')
        return $this->morphMany(Comment::class,'commentable');
        //ejemplo del nombre de una relación polimorfica-> seoble, likeable, votable
    }
}
