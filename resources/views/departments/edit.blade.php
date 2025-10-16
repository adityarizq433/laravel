@extends('master')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Departemen: {{ $department->nama ?? $department->nama_departemen }}</h1>
        <form action="{{ route('departments.update', $department->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Departemen</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $department->nama ?? $department->nama_departemen) }}" required>
            </div>
            <button type="submit" class="btn btn-warning me-2">Update</button>
            <a href="{{ route('departments.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
