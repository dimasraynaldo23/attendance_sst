<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusProject extends Model
{
    protected $table = 'status_projects';
    protected $fillable = ['status'];
}
