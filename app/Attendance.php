<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';
    protected $primaryKey = 'id';
    protected $fillable = ['nik', 'present', 'absent', 'note'];
    
    // public function getDate($date)
    // {
    //     $date = DB::table('attendances')
    //     ->where('created_at','=', $date)
    //     ->get();
    //     return $date;
    // }
}
