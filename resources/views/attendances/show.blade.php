@extends('master')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Detail Kehadiran</h1>
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                Informasi Kehadiran Pegawai
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th style="width: 30%;">Nama Pegawai</th>
                            <td>{{ $attendance->employee->nama_lengkap ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Departemen/Jabatan</th>
                            <td>{{ $attendance->employee->department->nama ?? 'N/A' }} / {{ $attendance->employee->position->nama_jabatan ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>{{ \Carbon\Carbon::parse($attendance->tanggal)->format('d F Y') }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                <span class="badge bg-{{ $attendance->status == 'Hadir' ? 'success' : ($attendance->status == 'Sakit' || $attendance->status == 'Izin' ? 'warning' : 'danger') }}">
                                    {{ $attendance->status }}
                                </span>
                            </td>
                        </tr>
                        </tbody>
                </table>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('attendances.edit', $attendance->id) }}" class="btn btn-warning me-2">Edit</a>
                <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
