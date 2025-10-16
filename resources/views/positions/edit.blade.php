@extends('master')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Jabatan: {{ $position->nama_jabatan }}</h1>
        <form action="{{ route('positions.update', $position->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan"
                    value="{{ old('nama_jabatan', $position->nama_jabatan) }}" required>
            </div>
            <div class="mb-3">
                <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                <input type="number" step="0.01" class="form-control" id="gaji_pokok" name="gaji_pokok"
                    value="{{ old('gaji_pokok', $position->gaji_pokok) }}" required>
            </div>
            <button type="submit" class="btn btn-warning me-2">Update</button>
            <a href="{{ route('positions.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
