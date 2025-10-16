@extends('master')

@section('content')

    <div class="container mt-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Ada masalah dengan input Anda.<br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1 class="mb-4">Form Edit Pegawai</h1>
        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                    value="{{ old('nama_lengkap', $employee->nama_lengkap) }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ old('email', $employee->email) }}" required>
            </div>
            <div class="mb-3">
                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon"
                    value="{{ old('nomor_telepon', $employee->nomor_telepon) }}">
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                    value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ old('alamat', $employee->alamat) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk"
                    value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Departement</label>
                <select class="form-select" id="status" name="departemen_id" required>
                    @foreach ($departments as $departments)
                        <option value="{{ $departments->id }}"
                            {{ old('departemen_id', $employee->departemen_id) == $departments->id ? 'selected' : '' }}>
                            {{ $departments->nama_departemen }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Jabatan</label>
                <select class="form-select" id="status" name="position_id" required>
                    @foreach ($positions as $positions)
                        <option value="{{ $positions->id }}"
                            {{ old('position_id', $employee->position_id) == $positions->id ? 'selected' : '' }}>
                            {{ $positions->nama_jabatan }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Nonaktif" {{ old('status') == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success me-2">Simpan Pegawai</button>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

@endsection
