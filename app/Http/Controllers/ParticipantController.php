<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $participants = Participant::orderBy('registration_number')->paginate(5);
        return view('participant.index', [
            'participants' => $participants
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('participant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => ['required','max:60'],
            'registration_number' => ['required', 'max:7', 'unique:'.Participant::class],
            'gender' => ['required'],
            'school' => ['required', 'max:60'],
            'birth_place' => ['required', 'max:60'],
            'birth_date' => ['required']
        ]);

        $validateData['user_id'] = auth()->user()->id;

        Participant::create($validateData);
        return redirect('/participant');
    }

    /**
     * Display the specified resource.
     */
    public function show(Participant $participant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Participant $participant)
    {
        return view('participant.edit', [
            'participant' => $participant
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Participant $participant)
    {
        $validateData = $request->validate([
            'name' => ['required','max:60'],
            'registration_number' => ['required', 'max:7'],
            'gender' => ['required'],
            'school' => ['required', 'max:60'],
            'birth_place' => ['required', 'max:60'],
            'birth_date' => ['required']
        ]);

        $validateData['user_id'] = auth()->user()->id;
        Participant::where('id', $participant->id)->update($validateData);
        return redirect('/participant');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Participant $participant)
    {
        Participant::destroy($participant->id);
        return redirect('/participant');
    }
}
