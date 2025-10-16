@extends('master')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Form Tambah Jabatan</h1>
        <form action="{{ route('positions.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan"
                    value="{{ old('nama_jabatan') }}" required>
            </div>
            <div class="mb-3">
                <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                <input type="number" step="0.01" class="form-control" id="gaji_pokok" name="gaji_pokok"
                    value="{{ old('gaji_pokok') }}" required>
            </div>
            <button type="submit" class="btn btn-success me-2">Simpan</button>
            <a href="{{ route('positions.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
