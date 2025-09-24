<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){

        $branch = Auth::user()->branch;
        $yearToday = date('Y');
        $monthToday = date('m');
        $eventYear = array();
        $recallYear = array();
        $blockoffYear = array();

        $recents = DB::table('events')
            ->select(DB::raw("*,
                IF(TIMESTAMPDIFF(WEEK, DateEncoded, now()) > 0,
                    TIMESTAMPDIFF(WEEK, DateEncoded, now()),
                    IF(TIMESTAMPDIFF(DAY, DateEncoded, now()) > 0,
                        TIMESTAMPDIFF(DAY, DateEncoded, now()),
                        IF(TIMESTAMPDIFF(HOUR, DateEncoded, now()) > 0,
                            TIMESTAMPDIFF(HOUR, DateEncoded, now()),
                            TIMESTAMPDIFF(MINUTE, DateEncoded, now())
                        )
                    )
                ) as difference,
                IF(TIMESTAMPDIFF(WEEK, DateEncoded, now()) > 0, 'weeks',
                        IF(TIMESTAMPDIFF(DAY, DateEncoded, now()) > 0, 'days',
                                IF(TIMESTAMPDIFF(HOUR, DateEncoded, now()) > 0, 'hrs', 'min')
                    )
                ) as difference_type
            "))
            ->where('branch',$branch)
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        $events = DB::table('events')->where('branch',$branch)->whereYear('start',$yearToday)->whereMonth('start',$monthToday)->count();
        $recalls = DB::table('recalls')->where('branch',$branch)->whereYear('start',$yearToday)->whereMonth('start',$monthToday)->count();
        $blockoffs = DB::table('blockoffs')->where('branch',$branch)->whereYear('start',$yearToday)->whereMonth('start',$monthToday)->count();
        
        $eventMonthly = DB::table('events')
            ->select(DB::raw('COUNT(*) as row_count, DATE_FORMAT(start, "%Y-%m") as month'))
            ->groupBy(DB::raw('DATE_FORMAT(start, "%Y-%m")'))
            ->where('branch',$branch)
            ->whereYear('start',$yearToday)
            ->get();

        $recallMonthly = DB::table('recalls')
            ->select(DB::raw('COUNT(*) as row_count, DATE_FORMAT(start, "%Y-%m") as month'))
            ->groupBy(DB::raw('DATE_FORMAT(start, "%Y-%m")'))
            ->where('branch',$branch)
            ->whereYear('start',$yearToday)
            ->get();

        $blockoffMonthly = DB::table('blockoffs')
            ->select(DB::raw('COUNT(*) as row_count, DATE_FORMAT(start, "%Y-%m") as month'))
            ->groupBy(DB::raw('DATE_FORMAT(start, "%Y-%m")'))
            ->where('branch',$branch)
            ->whereYear('start',$yearToday)
            ->get();

        foreach($eventMonthly as $item){
            $eventYear[] = $item->row_count;
        }

        foreach($recallMonthly as $item){
            $recallYear[] = $item->row_count;
        }

        foreach($blockoffMonthly as $item){
            $blockoffYear[] = $item->row_count;
        }

        return view('dashboard', compact('recents','events','recalls','blockoffs','eventYear','recallYear','blockoffYear'));
    }
}
