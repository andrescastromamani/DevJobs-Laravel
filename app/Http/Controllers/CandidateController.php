<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Vacancy;
use App\Notifications\NewVacancy;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id_vacancy = $request->route('id');
        $candidates = Candidate::all();
        $vacancy = Vacancy::findOrFail($id_vacancy);
        return view('candidates.index', compact('vacancy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'cv' => 'required|mimes:pdf',
            'vacancy_id' => 'required'
        ]);
        if ($request->file('cv')) {
            $file = $request->file('cv');
            $fileName = time() . '.' . $request->file('cv')->extension();
            $file->move(public_path('/storage/cv'), $fileName);
        }
        $vacancy = Vacancy::find($data['vacancy_id']);
        $vacancy->candidates()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'cv' => $fileName
        ]);
        $recruiter = $vacancy->user;
        $recruiter->notify(new NewVacancy($vacancy->title, $vacancy->id));
        return back()->with('success', 'Candidate added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public
    function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public
    function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Candidate $candidate
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(Candidate $candidate)
    {
        //
    }
}
