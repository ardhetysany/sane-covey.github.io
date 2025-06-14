<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = ['name', 'password'];

    protected $hidden = ['password'];

    public $timestamps = true;
}