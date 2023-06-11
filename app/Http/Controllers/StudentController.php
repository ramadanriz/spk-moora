<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = $this->getData();
        return view('student.index', [
            "students" => $students
        ]);
    }

    public function getData() {
        $user = auth()->user();
        $userId = $user->id;
        $students = Student::where('user_id', $userId)->get();

        return $students;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'student_id_number' => ['required', 'unique:'.Student::class],
            'name' => ['required', 'max:60'],
            'class' => ['required', 'max:60'],
            'major' => ['required', 'max:60'],
            'gender' => ['required'],
            'knowledge' => ['required'],
            'interview' => ['required'],
            'pbb' => ['required'],
            'physical' => ['required']
        ]);

        $validateData['user_id'] = auth()->user()->id;

        Student::create($validateData);
        return redirect('/student');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('student.show', [
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('student.edit', [
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'student_id_number' => ['required'],
            'name' => ['required', 'max:60'],
            'class' => ['required', 'max:60'],
            'major' => ['required', 'max:60'],
            'gender' => ['required'],
            'knowledge' => ['required'],
            'interview' => ['required'],
            'pbb' => ['required'],
            'physical' => ['required']
        ]);

        $student->update($request->all());
        return redirect('/student');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
        return redirect('/student');
    }

    public function student_list() {
        $students = Student::all();
        return view('student.student_list', [
            'students' => $students
        ]);
    }
}
