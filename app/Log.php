<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed body
 * @property mixed title
 * @property bool|string date
 */
class Log extends Model
{
    protected $fillable = ['title', 'date','body'];
    //


}
