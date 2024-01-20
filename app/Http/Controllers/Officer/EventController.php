<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\Event;
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
}
