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
            <h1 class="mb-4">Edit Data Gaji</h1>
            <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="employee_id">Nama Pegawai</label>
                    <p class="form-control-static">
                        {{ $salary->employee->nama_lengkap ?? 'N/A' }}
                        ({{ $salary->employee->position->nama_jabatan ?? 'N/A' }})
                    </p>
                    <input type="hidden" name="karyawan_id" value="{{ $salary->karyawan_id }}">
                    @error('karyawan_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="periode_gaji" class="form-label">Periode Gaji (Bulan/Tahun)</label>
                    <input type="month" class="form-control" id="periode_gaji" name="bulan"
                        value="{{ old('periode_gaji', $salary->periode_gaji) }}" required>
                </div>
                <div class="mb-3">
                    <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                    <input type="number" step="0.01" class="form-control" id="gaji_pokok" name="gaji_pokok"
                        value="{{ old('gaji_pokok', $salary->gaji_pokok) }}" required>
                </div>
                <div class="mb-3">
                    <label for="tunjangan" class="form-label">Tunjangan</label>
                    <input type="number" step="0.01" class="form-control" id="tunjangan" name="tunjangan"
                        value="{{ old('tunjangan', $salary->tunjangan) }}">
                </div>
                <div class="mb-3">
                    <label for="potongan" class="form-label">Potongan</label>
                    <input type="number" step="0.01" class="form-control" id="potongan" name="potongan"
                        value="{{ old('potongan', $salary->potongan) }}">
                </div>
                <button type="submit" class="btn btn-warning me-2">Update Gaji</button>
                <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    @endsection
