<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recall extends Model
{
    protected $table = 'recalls';
    protected $fillable = [
        'title', 'color', 'start', 'end', 'remarks', 'user_id'
    ];
    protected $date = ['created_at, updated_at'];
}