@extends('layouts.app')

@section('title', 'Tambah Mata Kuliah')

@section('content')
    <div class="page-header">
        <h1>
            <i class="bi bi-plus-circle me-2"></i>
            Tambah Mata Kuliah
        </h1>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-pencil-square me-2"></i>Form Tambah Mata Kuliah
                </div>
                <div class="card-body">
                    <form action="{{ route('subjects.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="code" class="form-label">
                                Kode Mata Kuliah <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control @error('code') is-invalid @enderror" 
                                   id="code" 
                                   name="code" 
                                   value="{{ old('code') }}"
                                   placeholder="Contoh: PWE101"
                                   required>
                            @error('code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Nama Mata Kuliah <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}"
                                   placeholder="Contoh: Pemrograman Web"
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
                                    <option value="{{ $program->id }}" {{ old('study_program_id') == $program->id ? 'selected' : '' }}>
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
                                <i class="bi bi-save me-1"></i>Simpan
                            </button>
                            <a href="{{ route('subjects.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle me-1"></i>Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
