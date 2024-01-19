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
        $events = Event::all();
        return view('officer.event.create', compact('events'));
    }
}
