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
            <h1 class="mb-4">Input Gaji untuk {{ $employee->nama_lengkap ?? 'Pegawai Baru' }}</h1>
            <form action="{{ route('salaries.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="employee_id">Nama Pegawai</label>
                    <select name="karyawan_id" id="karyawan_id" class="form-control" required>
                        <option value="">Pilih Pegawai</option>
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}">
                                {{ $employee->nama_lengkap }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="periode">Periode Gaji</label>
                    <input type="month" name="bulan" id="bulan" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                    <label for="gaji_pokok">Gaji Pokok</label>
                    <input type="number" name="gaji_pokok" id="gaji_pokok" class="form-control" required min="0">
                </div>
                <div class="form-group mb-3">
                    <label for="tunjangan">Tunjangan</label>
                    <input type="number" name="tunjangan" id="tunjangan" class="form-control" value="0"
                        min="0">
                </div>
                <div class="form-group mb-3">
                    <label for="potongan">Potongan</label>
                    <input type="number" name="potongan" id="potongan" class="form-control" value="0" min="0">
                </div>
                <button type="submit" class="btn btn-success mt-3">Simpan Gaji</button>
            </form>
        </div>
    @endsection
