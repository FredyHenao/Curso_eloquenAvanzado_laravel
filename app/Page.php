<?php

namespace eloquenAvance;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['name','body'];

    public function comments()
    {
        //relaciones polimorficas
        return $this->morphMany(Comment::class,'commentable');
        //ejemplo del nombre de una relación polimorfica-> seoble, likeable, votable
    }
}
