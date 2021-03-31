<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mandays;
use App\Attendance;
use Carbon\Carbon;
use Illuminate\Queue\LuaScripts;

class ApproveController extends Controller
{
    public function index(Attendance $attendance)
    {
       
        $attendances = Attendance::where('created_at', '>=' , Carbon::now()->subDays(31))
            ->groupBy('date')
            ->orderBy('date','desc') 
            ->get(array(
                DB::raw('Date(created_at) as date')
            ));
            
            return view('admin.approve.index', compact('attendances'));
        }
        
        public function attendanceList($date)
        {
            // $mandays = Mandays::all();
            // $attendance_date = $attendance->created_at;
            // $attendances = Attendance::query()->where('created_at','=',$date);

        $attendances = DB::table('attendances')
                       ->whereDate('attendances.created_at', $date)
                       ->get();

        return view('admin.approve.attendanceList', compact('attendances'));
        }
        
        public static function mandays($nik, $date)
        {
            $mandays = DB::table('mandays')
                // ->join('attendances','mandays.created_at','=','attendances.created_at')
                // ->select('attendances.note','mandays.project_code','mandays.start_time','mandays.end_time','mandays.nik','mandays.created_at')
            ->where('nik', $nik)
            ->whereDate('created_at', date('Y-m-d', strtotime($date)))
            ->whereNotNull('start_time')
            ->get();
            
            // dd($mandays);
            return $mandays;
       }

       public function approve(Request $request, Attendance $attendance)
       {
           $attendance_id = $attendance->id;
           $attendance = Attendance::findOrFail($attendance_id);
        //    $attendance->delete();

           $attendance->approval_note = '-';
           $attendance->status_approval = 'approve';

           $attendance->update();
           return redirect()->back()->with('success','Approved!');
       }


        public function reject(Request $request, Attendance $attendance)
        {
            $attendance_id = $attendance->id;
            $attendance = Attendance::findOrFail($attendance_id);

            $attendance->approval_note = $request->input('note_reject');
            $attendance->status_approval = 'reject';

            $attendance->update();
            return redirect()->back()->with('success','Rejected!');

        }

}
 // $attendances = Attendance::all()

        // $attendances = Attendance::WhereBetween('created_at', [now(), now()->subDays(7)])
        //     ->orderBy('created_at')
        //     ->get()
        //     ->groupBy(function($val){
        //         return Carbon::parse($val->created_at)->format('Y-m-d');
        //     });

        // $attendances = Attendance::where('created_at', [now(), now()->addDays(7)])
        //     ->orderBy('created_at')
        //     ->get()
        //     ->groupBy(function($data){
        //         return Carbon::parse($data->created_at)->format('Y-m-d');
        //     });
        // $attendances = Attendance::where('created_at', '>=', Carbon::now()->subMonth())
        //                 ->groupBy(DB::raw('Date(created_at)'))
        //                 ->orderBy('created_at', 'DESC')->get();
                        
        // $report = [];
        // $dates = Attendance::select([
        //         'nik',
        //         \DB::raw("DATE_FORMAT(created_at,'Y-m-d) as date"),
        // ])
        //     ->groupBy('date')
        //     ->get();
        
        // $nik = $dates->pluck('nik')->sortBy('nik')->unique();
        

        // $attendances = Attendance::orderBy('created_at', 'DESC')->get();
        
        // $attendances = Attendance::where('created_at', '>=', date('Y-m-d'). '00:00:00')
        //     ->where('created_at', '<=', date('Y-m-d'). '23:59:59')
        //     ->get();
        
        // $attendances = Attendance::whereRaw("DATE(created_at) = '" . date('Y-m-d') . "'")->get();
        
        // $attendances = Attendance::whereDate('created_at', now()->subDays(30))
        // ->get();
        
        // $attendances = Attendance::whereYear('created_at', now()->year)
        // ->whereMonth('created_at', now()->month)->get();
        // $attendances = Attendance::whereDate('created_at', now()->subDays(30))->get();

            //     public static function mandays($nik, $date)
    //     {
    //         $mandays = DB::table('mandays')
    //             // ->join('attendances','mandays.created_at','=','attendances.created_at')
    //             // ->select('mandays.nik','attendances.created_at')
    //         ->where('mandays.nik', $nik)
    //         // ->where('attendances.note', $note )
    //         ->whereDate('attendances.created_at', date('Y-m-d', strtotime($date)))
    //         ->whereNotNull('start_time')
    //         ->get();
    //         // dd($mandays);
    //         return $mandays;
    //    }

    //    public static function reject($nik, $note)
    //    {
    //     $attendances = DB::table('attendances')
    //         // ->join('attendances','mandays.created_at','=','attendances.created_at')
    //         ->select('*')
    //         ->where('nik',$nik)
    //         ->get();
    //        return $attendances;
    //    }