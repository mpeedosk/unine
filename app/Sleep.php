<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sleep extends Model
{
    protected $table = 'sleep';
    protected $visible = ['hours', 'created_at', 'extra'];

    //
}
