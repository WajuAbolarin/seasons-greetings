<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected  $guarded = [];

    protected $dates = [
        'created_at',
        'update_at',
        'schedule_time',
    ];

}
