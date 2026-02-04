@extends('layouts.app')

@section('title', 'Daftar Mata Kuliah')

@section('content')
    <div class="page-header">
        <h1>
            <i class="bi bi-journal-bookmark-fill me-2"></i>
            Daftar Mata Kuliah
        </h1>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="bi bi-table me-2"></i>Data Mata Kuliah</span>
            <a href="{{ route('subjects.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle me-1"></i>Tambah Mata Kuliah
            </a>
        </div>
        <div class="card-body">
            @if($subjects->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead>
                            <tr>
                                <th style="width: 5%">No</th>
                                <th style="width: 15%">Kode</th>
                                <th style="width: 35%">Nama Mata Kuliah</th>
                                <th style="width: 25%">Program Studi</th>
                                <th style="width: 20%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subjects as $index => $subject)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <span class="badge bg-success">{{ $subject->code }}</span>
                                    </td>
                                    <td>{{ $subject->name }}</td>
                                    <td>{{ $subject->studyProgram->name }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('subjects.edit', $subject) }}" 
                                           class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil-square me-1"></i>Edit
                                        </a>
                                        
                                        <form id="delete-form-{{ $subject->id }}" 
                                              action="{{ route('subjects.destroy', $subject) }}" 
                                              method="POST" 
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" 
                                                    onclick="confirmDelete('delete-form-{{ $subject->id }}')" 
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
                    Belum ada data mata kuliah. 
                    <a href="{{ route('subjects.create') }}" class="alert-link">Tambah data</a> sekarang.
                </div>
            @endif
        </div>
    </div>
@endsection
