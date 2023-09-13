<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporter extends Model
{
    use HasFactory;

    protected $table = 'reporters';

    protected $fillable = [
        'name',
        'firstname',
        'email',
        'password'
    ];

    protected $hidden = [];
}
