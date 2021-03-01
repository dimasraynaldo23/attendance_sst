<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // protected $primarykey = 'id_employee';
    protected $fillable = ['name', 'nik', 'email', 'position'];
}
