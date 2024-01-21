<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Event;
use App\Models\Polling;
use App\Models\User;
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

        $user = Polling::join('users', 'users.id', '=', 'pollings.user_id')
        ->join('majors', 'users.major_id', '=', 'majors.id')
        ->where('event_id', $id)
        ->select('majors.name as major_name', 'majors.id as id')
        ->get();

        //dd($user);

        $classroom = [];

        foreach($user as $item) {
            $classroom[$item->id] = User::where('major_id', $item->id)->count();
        }

        //dd($classroom);
        return view('officer.event.detail', compact('event', 'totalVoter', 'candidates', 'voteCandidates'));
    }
}
