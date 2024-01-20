<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class EventVoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('officer.vote.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validators = Validator::make($request->all(), [
            'event_name' => 'required',
            'event_category' => 'required',
            'event_start_date' => 'required',
            'event_end_date' => 'required',
            'candidate_name' => 'required',
            'candidate_image' => 'required',
            'candidate_vision' => 'required'
        ]);

        if($validators->fails()){
            return redirect()->back()->with(['error' => "Pastikan semua form lengkap!"]);
        }

        $event = Event::create([
            'name' => $request->input('event_name'),
            'slug' => Str::slug($request->input('event_name') . '-' . Str::random(5)),
            'category' => $request->input('event_category'),
            'event_start' => $request->input('event_start_date'),
            'event_end' => $request->input('event_end_date'),
        ]);


        foreach ($request->input('candidate_name') as $key => $value) {
            Candidate::create([
                'event_id' => $event->id,
                'name' => $value,
                'image' => $request->file('candidate_image')[$key]->store('images'),
                'vision' => $request->input('candidate_vision')[$key],
            ]);
        }

        return redirect()->route('officer.event.index')->with(['success' => "Event berhasil ditambahkan"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        Candidate::where('event_id', $id)->delete();
        Event::find($id)->delete();
        return redirect()->back()->with(['success' => "Acara telah dihapus"]);
    }
}
