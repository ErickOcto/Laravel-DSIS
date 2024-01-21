<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Event;
use App\Models\Polling;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events = Event::all();
        return view('officer.event.index', compact('events'));
    }

    public function create(){
        return view('officer.event.create');
    }

    public function vote(){
        $events = Event::where('category', '=', 'vote')->get();
        return view('officer.event.index', compact('events'));
    }

    public function porseni(){
        $events = Event::where('category', '=', 'porseni')->get();
        return view('officer.event.index', compact('events'));
    }

    public function lks(){
        $events = Event::where('category', '=', 'lks')->get();
        return view('officer.event.index', compact('events'));
    }

    public function eventDetail($id){
        $event = Event::findOrFail($id);
        $totalVoter = Polling::where('event_id', $id)->count();
        $candidates = Candidate::where('event_id', $id)->get();

        $voteCandidates = [];

        foreach ($candidates as $item) {
            $voteCandidates[$item->id] = Polling::where('candidate_id', $item->id)->count();
        }
        //dd($voteCandidates);
        return view('officer.event.detail', compact('event', 'totalVoter', 'candidates', 'voteCandidates'));
    }
}
