@extends('master')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Form Tambah Departemen</h1>
        <form action="{{ route('departments.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Departemen</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
            </div>
            <button type="submit" class="btn btn-success me-2">Simpan</button>
            <a href="{{ route('departments.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
