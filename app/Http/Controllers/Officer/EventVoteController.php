<?php

namespace App\Http\Controllers\Officer;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Event;
use App\Models\Polling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class EventVoteController extends Controller
{
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
                //'image' => $request->file('candidate_image')[$key]->storeAs('public/candidate', $request->file('candidate_image')[$key]->hashName()),
                'image' => str_replace('public/candidate/', '', $request->file('candidate_image')[$key]->storeAs('public/candidate', $request->file('candidate_image')[$key]->hashName())),
                'vision' => $request->input('candidate_vision')[$key],
            ]);
        }

        return redirect()->route('officer.event.index')->with(['success' => "Event berhasil ditambahkan"]);
    }

    public function studentIndex(){
        $events = Event::all();
        //$check = Polling::where('user_id', Auth::user()->id);
        return view('student.polling.index', compact('events'));
    }

    public function studentVote($id){
        $event = Event::findOrFail($id);
        $candidates = Candidate::where('event_id', $id)->get();
        $check = Polling::where('user_id', '=', Auth::user()->id)->where('event_id', $id)->first();
        if($check){
            return redirect()->back()->with(['error' => "Anda  sudah melakukan voting"]);
        }
        return view('student.polling.vote', compact('candidates', 'event'));
    }

    public function studentCreate(Request $request, $id){
        $validators  = Validator::make($request->all(), [
            'candidate_id' => 'required'
        ]);

        if($validators->fails()){
            return redirect()->back()->with(['error' => "Pilihan tidak valid"]);
        }

        Polling::create([
            'user_id' => Auth::user()->id,
            'candidate_id' => $request->candidate_id,
            'event_id' => $id
        ]);

        return redirect()->route('student.polling.index')->with(['success' => "Berhasil Voting"]);
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
