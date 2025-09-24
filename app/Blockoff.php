<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blockoff extends Model
{
    protected $table = 'blockoffs';
    protected $fillable = [
        'title', 'color', 'start', 'end', 'user_id'
    ];
    protected $date = ['created_at, updated_at'];
}