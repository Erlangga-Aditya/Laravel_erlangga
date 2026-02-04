@extends('layouts.app')

@section('title', 'Daftar Mahasiswa')

@section('content')
    <div class="page-header">
        <h1>
            <i class="bi bi-people-fill me-2"></i>
            Daftar Mahasiswa
        </h1>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-table me-2"></i>Data Mahasiswa</span>
            <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle me-1"></i>Tambah Mahasiswa
            </a>
        </div>
        <div class="card-body">
            @if($students->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 15%">NIM</th>
                                <th style="width: 35%">Nama Mahasiswa</th>
                                <th style="width: 25%">Program Studi</th>
                                <th style="width: 20%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $index => $student)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <span class="badge bg-secondary">{{ $student->nim }}</span>
                                    </td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->studyProgram->name }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('students.edit', $student) }}" 
                                           class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square me-1"></i>Edit
                                        </a>
                                        
                                        <form id="delete-form-{{ $student->id }}" 
                                              action="{{ route('students.destroy', $student) }}" 
                                              method="POST" 
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" 
                                                    onclick="confirmDelete('delete-form-{{ $student->id }}')" 
                                                    class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash me-1"></i>Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info mb-0">
                    <i class="bi bi-info-circle me-2"></i>
                    Belum ada data mahasiswa. 
                    <a href="{{ route('students.create') }}" class="alert-link">Tambah data</a> sekarang.
                </div>
            @endif
        </div>
    </div>
@endsection
