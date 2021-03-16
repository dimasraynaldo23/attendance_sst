<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    // protected $primarykey = 'id_employee';
    protected $table = 'employees';
    protected $fillable = ['name', 'nik', 'email', 'position'];

    use SoftDeletes;
}
