<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\StudyProgram;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('studyProgram')->get();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        $studyPrograms = StudyProgram::all();
        return view('subjects.create', compact('studyPrograms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:subjects,code|max:10',
            'name' => 'required|string|max:255',
            'study_program_id' => 'required|exists:study_programs,id',
        ]);

        Subject::create($request->all());

        return redirect()->route('subjects.index')
            ->with('success', 'Mata Kuliah berhasil ditambahkan.');
    }

    public function edit(Subject $subject)
    {
        $studyPrograms = StudyProgram::all();
        return view('subjects.edit', compact('subject', 'studyPrograms'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'code' => 'required|max:10|unique:subjects,code,' . $subject->id,
            'name' => 'required|string|max:255',
            'study_program_id' => 'required|exists:study_programs,id',
        ]);

        $subject->update($request->all());

        return redirect()->route('subjects.index')
            ->with('success', 'Mata Kuliah berhasil diperbarui.');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subjects.index')
            ->with('success', 'Mata Kuliah berhasil dihapus.');
    }
}
