<?php

namespace App\Http\Controllers;

use App\Models\StudyProgram;
use Illuminate\Http\Request;

class StudyProgramController extends Controller
{
    public function index()
    {
        $studyPrograms = StudyProgram::all();
        return view('study-programs.index', compact('studyPrograms'));
    }

    public function create()
    {
        return view('study-programs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:study_programs,code|max:10',
            'name' => 'required|string|max:255',
        ]);

        StudyProgram::create($request->all());

        return redirect()->route('study-programs.index')
            ->with('success', 'Program Studi berhasil ditambahkan.');
    }

    public function edit(StudyProgram $studyProgram)
    {
        return view('study-programs.edit', compact('studyProgram'));
    }

    public function update(Request $request, StudyProgram $studyProgram)
    {
        $request->validate([
            'code' => 'required|max:10|unique:study_programs,code,' . $studyProgram->id,
            'name' => 'required|string|max:255',
        ]);

        $studyProgram->update($request->all());

        return redirect()->route('study-programs.index')
            ->with('success', 'Program Studi berhasil diperbarui.');
    }

    public function destroy(StudyProgram $studyProgram)
    {
        $studyProgram->delete();

        return redirect()->route('study-programs.index')
            ->with('success', 'Program Studi berhasil dihapus.');
    }
}
