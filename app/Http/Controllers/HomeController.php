<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\City;

class HomeController extends Controller
{
    /**
     * Display the dashboard with statistics.
     */
    public function index()
    {
        $totalStudents = Student::count();
        $totalCities = City::count();
        $recentStudents = Student::with('city')->latest()->take(5)->get();
        $citiesWithStudentCount = City::withCount('students')->orderBy('students_count', 'desc')->take(5)->get();

        return view('home', compact('totalStudents', 'totalCities', 'recentStudents', 'citiesWithStudentCount'));
    }
}
