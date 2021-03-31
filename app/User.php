<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable, HasRoles;
    
    protected $fillable = [
        'name', 'nik', 'email', 'password', 'position', 'address', 'avatar', 
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

}
