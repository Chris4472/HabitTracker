<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::get(['title','start'])->where('start', '>' ,Carbon::now());
        
        foreach($events as $event) $event['timeDifference'] = $this->getTimeDifference($event['start']);
        
        return response()->json(["events" => $events]);
    }

    private function getTimeDifference($startTime){
        $startTime = Carbon::parse($startTime);

        if($startTime->diffInHours(Carbon::now()) < 24){
            return gmdate('H:i:s', Carbon::now()->diffInSeconds($startTime));
        }
        else{
            return gmdate('d', Carbon::now()->diffInSeconds($startTime)) . " days";
        }
    }
}
