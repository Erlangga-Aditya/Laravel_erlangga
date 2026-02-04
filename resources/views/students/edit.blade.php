@extends('layouts.app')

@section('title', 'Edit Mahasiswa')

@section('content')
    <div class="page-header">
        <h1>
            <i class="bi bi-pencil-square me-2"></i>
            Edit Mahasiswa
        </h1>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-pencil-square me-2"></i>Form Edit Mahasiswa
                </div>
                <div class="card-body">
                    <form action="{{ route('students.update', $student) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="nim" class="form-label">
                                NIM <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control @error('nim') is-invalid @enderror" 
                                   id="nim" 
                                   name="nim" 
                                   value="{{ old('nim', $student->nim) }}"
                                   placeholder="Contoh: 12345678"
                                   required>
                            @error('nim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Nama Mahasiswa <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name', $student->name) }}"
                                   placeholder="Contoh: John Doe"
                                   required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="study_program_id" class="form-label">
                                Program Studi <span class="text-danger">*</span>
                            </label>
                            <select class="form-select @error('study_program_id') is-invalid @enderror" 
                                    id="study_program_id" 
                                    name="study_program_id" 
                                    required>
                                <option value="">Pilih Program Studi</option>
                                @foreach($studyPrograms as $program)
                                    <option value="{{ $program->id }}" {{ old('study_program_id', $student->study_program_id) == $program->id ? 'selected' : '' }}>
                                        {{ $program->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('study_program_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i>Update
                            </button>
                            <a href="{{ route('students.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle me-1"></i>Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
