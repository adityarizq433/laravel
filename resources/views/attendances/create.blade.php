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
        <div class="container mt-5">
            <h1 class="mb-4">Form Catat Kehadiran</h1>
            <form action="{{ route('attendances.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="karyawan_id" class="form-label">Nama Pegawai</label>
                    <select class="form-control" id="karyawan_id" name="karyawan_id" required>
                        <option value="">Pilih Pegawai</option>
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}" {{ old('karyawan_id') == $employee->id ? 'selected' : '' }}>
                                {{ $employee->nama_lengkap }} ({{ $employee->position?->nama_jabatan ?? 'N/A' }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal"
                        value="{{ old('tanggal', date('Y-m-d')) }}" required>
                </div>
                <div class="mb-3">
                    <label for="waktu_masuk" class="form-label">Waktu Masuk</label>
                    <input type="time" class="form-control" id="waktu_masuk" name="waktu_masuk"
                        value="{{ old('waktu_masuk') }}">
                </div>
                <div class="mb-3">
                    <label for="waktu_keluar" class="form-label">Waktu Keluar</label>
                    <input type="time" class="form-control" id="waktu_keluar" name="waktu_keluar"
                        value="{{ old('waktu_keluar') }}">
                </div>
                <div class="form-group mb-3">
                    <label for="status_absensi">Status Absensi</label>
                    <select name="status_absensi" id="status_absensi" class="form-control " required>
                        <option value="">Pilih Status</option>
                        <option value="Hadir">Hadir</option>
                        <option value="Sakit">Sakit</option>
                        <option value="Izin">Izin</option>
                        <option value="Alpha">Alpha</option>
                    </select>
                    @error('status_absensi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Simpan Kehadiran</button>
                    <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    @endsection
