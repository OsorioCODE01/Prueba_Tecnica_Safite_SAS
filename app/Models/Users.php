<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'usersf';
    protected $fillable = ['nombre', 'telefono', 'email'];
}
