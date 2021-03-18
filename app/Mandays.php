<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mandays extends Model
{
    protected $table = 'mandays';
    protected $primaryKey = 'id';
    protected $fillable = ['nik', 'project_code', 'start-time', 'end_time'];

    
}
