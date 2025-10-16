@extends('master')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Data Kehadiran</h1>
        <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="employee_id" class="form-label">Nama Pegawai</label>
                <select class="form-select @error('employee_id') is-invalid @enderror" id="employee_id" name="employee_id"
                    required>
                    <option value="">Pilih Pegawai</option>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}"
                            {{ old('employee_id', $attendance->employee_id) == $employee->id ? 'selected' : '' }}>
                            {{ $employee->nama_lengkap }} ({{ $employee->position->nama_jabatan ?? 'N/A' }})
                        </option>
                    @endforeach
                </select>
                @error('employee_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                    name="tanggal" value="{{ old('tanggal', $attendance->tanggal) }}" required>
                @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="waktu_masuk" class="form-label">Waktu Masuk</label>
                <input type="time" class="form-control @error('waktu_masuk') is-invalid @enderror" id="waktu_masuk"
                    name="waktu_masuk" value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}">
                @error('waktu_masuk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="waktu_keluar" class="form-label">Waktu Keluar</label>
                <input type="time" class="form-control @error('waktu_keluar') is-invalid @enderror" id="waktu_keluar"
                    name="waktu_keluar" value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}">
                @error('waktu_keluar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status Kehadiran</label>
                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                    @foreach ($statuses as $status)
                        <option value="{{ $status }}"
                            {{ old('status', $attendance->status_absensi) == $status ? 'selected' : '' }}>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-warning me-2">Update Kehadiran</button>
            <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
