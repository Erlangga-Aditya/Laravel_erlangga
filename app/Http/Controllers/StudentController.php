<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudyProgram;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('studyProgram')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $studyPrograms = StudyProgram::all();
        return view('students.create', compact('studyPrograms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:students,nim|max:20',
            'name' => 'required|string|max:255',
            'study_program_id' => 'required|exists:study_programs,id',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function edit(Student $student)
    {
        $studyPrograms = StudyProgram::all();
        return view('students.edit', compact('student', 'studyPrograms'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nim' => 'required|max:20|unique:students,nim,' . $student->id,
            'name' => 'required|string|max:255',
            'study_program_id' => 'required|exists:study_programs,id',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Mahasiswa berhasil diperbarui.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
