<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = [
        'title', 'description', 'color', 'start', 'end', 'remarks', 'branch', 'branch2', 'user_id'
    ];
    protected $date = ['created_at, updated_at'];
}
