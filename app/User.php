<?php

namespace eloquenAvance;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //se coloca la palabra en plural y se utiliza el metodo belongsToMany en las dos tablas para hacer referencia de muchos a muchos
    public function manyBooks(){
        return $this->belongsToMany(Book::class);
    }

    public function getBooksAttribute(){
        return $this->manyBooks()->pluck('book_id')->toArray();
    }

    public function exams(){
        return $this->belongsToMany(Exam::class)
            ->withPivot('score')
            ->withTimestamps();
    }
}
