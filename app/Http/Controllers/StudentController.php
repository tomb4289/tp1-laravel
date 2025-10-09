<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\City;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('city')->paginate(20);
        $students->withPath('/students');
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        return view('students.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|unique:students,email',
            'date_of_birth' => 'required|date|before:today',
            'city_id' => 'required|exists:cities,id'
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student->load('city');
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $cities = City::all();
        return view('students.edit', compact('student', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'date_of_birth' => 'required|date|before:today',
            'city_id' => 'required|exists:cities,id'
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        try {
            // Store student information for logging
            $studentInfo = [
                'id' => $student->id,
                'name' => $student->name,
                'email' => $student->email,
                'city' => $student->city->name
            ];

            // Delete the student
            $student->delete();

            // Log the deletion
            Log::info('Student deleted successfully', $studentInfo);

            return redirect()->route('students.index')
                ->with('success', "Student '{$studentInfo['name']}' has been deleted successfully.");
                
        } catch (\Exception $e) {
            // Log the error
            Log::error('Failed to delete student', [
                'student_id' => $student->id,
                'error' => $e->getMessage()
            ]);

            return redirect()->route('students.index')
                ->with('error', 'Failed to delete student. Please try again.');
        }
    }
}