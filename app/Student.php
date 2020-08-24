<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    protected $date = ['deleted_at'];
    protected $fillable = [
        'full_name', 'avatar', 'email', 'address',
    ];
    protected $table = 'students';
}
