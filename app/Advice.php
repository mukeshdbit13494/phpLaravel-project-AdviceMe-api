<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    protected $fillable = [
        'user_id', 'content',
    ];
}
