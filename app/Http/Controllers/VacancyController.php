<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Experience;
use App\Models\Location;
use App\Models\Salary;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vacancies = Vacancy::where('user_id', auth()->user()->id)->paginate(6);
        return view('vacancies.index', compact('vacancies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $experiences = Experience::all();
        $locations = Location::all();
        $salaries = Salary::all();
        return view('vacancies.create', compact('categories', 'experiences', 'locations', 'salaries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required|min:6',
            'category' => 'required',
            'experience' => 'required',
            'location' => 'required',
            'salary' => 'required',
            'description' => 'required|min:50',
            'image' => 'required',
            'skills' => 'required'

        ]);
        //save in the db
        auth()->user()->vacancies()->create([
            'title' => $validation['title'],
            'category_id' => $validation['category'],
            'experience_id' => $validation['experience'],
            'location_id' => $validation['location'],
            'salary_id' => $validation['salary'],
            'description' => $validation['description'],
            'skills' => $validation['skills'],
            'image' => $validation['image']
        ]);
        return redirect()->route('vacancies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Vacancy $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show(Vacancy $vacancy)
    {
        return view('vacancies.show', compact('vacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Vacancy $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancy $vacancy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Vacancy $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacancy $vacancy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Vacancy $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacancy $vacancy, Request $request)
    {
        //return response()->json($request->all());
        $vacancy->delete();
        return response()->json(['success' => 'Vacancte eliminada con exito: ' . $vacancy->title]);
    }

    public function image(Request $request)
    {
        $image = $request->file('file');
        $nameImage = time() . '.' . $image->extension();
        $image->move(public_path('storage/vacancies'), $nameImage);
        return response()->json(['correct' => $nameImage]);
    }

    public function deleteImage(Request $request)
    {
        if ($request->ajax()) {
            $image = $request->get('image');
            if (File::exists('storage/vacancies/' . $image)) {
                File::delete('storage/vacancies/' . $image);
            }
            return response('imagen eliminada', 200);
        }
    }

    public function state(Request $request, Vacancy $vacancy)
    {
        //return response()->json($request->status);
        $vacancy->is_active = $request->status;
        $vacancy->save();
        return response()->json(['correct' => 'ok']);
    }
}
