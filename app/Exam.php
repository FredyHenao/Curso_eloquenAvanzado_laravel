<?php

namespace eloquenAvance;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{

    public function users(){
        return $this->belongsToMany(User::class)
            ->withPivot('score')
            ->withTimestamps();
    }
}
