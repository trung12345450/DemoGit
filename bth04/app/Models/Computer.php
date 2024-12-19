<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    protected $table = 'computers';
    protected $fillable = ['computer_name', 'model', 'operating_system', 'processor', 'memory', 'available'];
}