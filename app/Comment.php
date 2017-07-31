<?php

namespace eloquenAvance;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['body'];

    public function commentable()
    {
        //transformarse a (morphTo)
        return $this->morphTo();
    }
}
