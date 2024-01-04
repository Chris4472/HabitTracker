<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $events = Event::get(['title','start']);
        
        foreach($events as $event) $event['timeDifference'] = $this->getTimeDifference($event['start']);
        
        return response()->json(["events" => $events]);
    }

    private function getTimeDifference($startTime){
        $startTime = Carbon::parse($startTime);

        return gmdate('H:i:s', Carbon::now()->diffInSeconds($startTime));
    }
}
