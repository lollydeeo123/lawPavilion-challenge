<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dumplog extends Model
{
    //
    protected $fillable = [
        'username',
        'database',
        'dumpsite',
        'mytables',

    ];
}
