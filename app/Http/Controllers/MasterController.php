<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class MasterController extends Controller
{
    public function events(){
        $from = date('2024-01-01');
        $to = date('2024-12-31');

        $branch = Auth::user()->branch;
        $events = DB::table('events')->where('branch',$branch)->whereBetween('start', [$from, $to])->get();
        
        return view('masterlist.events',compact('events'));
    }

    public function recallblockoff(){
        $branch = Auth::user()->branch;
        $recalls = DB::table('recalls')->where('branch',$branch)->orderBy('id', 'DESC')->get();
        $blockoffs = DB::table('blockoffs')->where('branch',$branch)->orderBy('id', 'DESC')->get();

        return view('masterlist.recalls',compact('recalls','blockoffs'));
    }

    public function blockoffs(){
        $branch = Auth::user()->branch;
        $blockoffs = DB::table('blockoffs')->where('branch',$branch)->orderBy('id', 'DESC')->get();

        return view('masterlist.blockoffs',compact('blockoffs'));
    }

    public function tasks(){

        return view('./masterlist/tasks');
    }
}
