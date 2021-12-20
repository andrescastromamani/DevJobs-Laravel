<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $vacancies = Vacancy::latest()->where('is_active', true)->take(10)->get();

        $locations = Location::all();

        return view('home', compact('vacancies', 'locations'));
    }
}
