<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TestController extends Controller
{
    public function index()
    {
        $nik = '230697';
        $date = '2021-03-18 11:05:07';

        $mandays = DB::table('mandays')
            //     ->join('attendances','mandays.created_at','=','attendances.created_at')
            //    ->select('mandays.start_time','mandays.project_code','mandays.end_time')
            ->where('nik', $nik)
            ->whereDate('created_at', date('Y-m-d', strtotime($date)))
            ->whereNotNull('start_time')
            ->get();

        dd($mandays);
    }
}
