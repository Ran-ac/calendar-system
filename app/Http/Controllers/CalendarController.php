<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Auth;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{
    public function index()
    {
        $from = date('2023-01-01');
        $to = date('2025-12-31');

        $branch = Auth::user()->branch;
        $account = Auth::user()->account;
        $events = DB::table('events')->where('branch',$branch)->whereBetween('start', [$from, $to])->get();
        // $events = DB::table('events')->where('branch',$branch)->get();

        
        return view('calendar',compact('events','account'));
    }

    public function store(Request $request){

        $event = Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'color' => $request->color,
            'remarks' => $request->remarks,
            'start' => $request->start_date,
            'end' => $request->end_date,
            'branch' => Auth::user()->branch,
            'user_id' => Auth::user()->id,
        ]);

        return response()->json($event);
    }

    public function update(Request $request, $id){
        $event = Event::find($id);
        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'color' => $request->color,
            'remarks' => $request->remarks,
        ]);

        return response()->json($event);
    }

    public function move(Request $request, $id){
        $event = Event::find($id);
        $event->update([
            'start' =>$request->start_date,
            'end' =>$request->end_date,
        ]);

        return response()->json('Event Updated');
    }

    public function resize(Request $request, $id){
        $event = Event::find($id);
        $event->update([
            'end' =>$request->end_date,
        ]);

        return response()->json('Event Updated');
    }

    public function destroy($id){
        $event = Event::find($id);
        $event->delete();

        return $id;
    }

    public function searchKeyword($keyword){
        
        $events = DB::table('events')->where('title','like','%'.$keyword.'%')->orWhere('description','like','%'.$keyword.'%')->get();
        $recalls = DB::table('recalls')->where('title','like','%'.$keyword.'%')->get();
        $blockoffs = DB::table('blockoffs')->where('title','like','%'.$keyword.'%')->get();

        return view('search',compact('events','recalls','blockoffs','keyword'));
    }

    
    public function searchBranch($branch)
    {
        $from = date('2023-01-01');
        $to = date('2025-12-31');

        $events = DB::table('events')->where('branch',$branch)->whereBetween('start', [$from, $to])->get();
        
        return view('other-calendar',compact('events','branch'));
    }

    public function publicCalendar(){
        $from = date('2023-01-01');
        $to = date('2025-12-31');

        $branch = Auth::user()->branch;
        $account = Auth::user()->account;
        $events = DB::table('events')->where('branch',$branch)->whereBetween('start', [$from, $to])->get();
        // $events = DB::table('events')->where('branch',$branch)->get();

        
        return view('public-calendar',compact('events','account'));
    }
}
