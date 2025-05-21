<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::filter()->get();
        return view('student-list.index', [
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student_list)
    {
        return view('student-list.show', [
            'student_list' => $student_list
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student_list)
    {
        return view('student-list.edit', [
            'student_list' => $student_list
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student_list)
    {
        $request->validate([
            'knowledge' => ['required'],
            'interview' => ['required'],
            'pbb' => ['required'],
            'physical' => ['required'],
            'absent' => ['required']
        ]);

        $student_list->update($request->all());
        return redirect('/student-list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
