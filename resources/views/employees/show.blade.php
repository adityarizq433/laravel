@extends('master')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Detail Data Pegawai</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th style="width: 30%;">Nama Lengkap</th>
                                <td>{{ $employee->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <th>Departemen</th>
                                <td>{{ $employee->department->nama ?? ($employee->department->nama_departemen ?? 'N/A') }}
                                </td>
                            </tr>
                            <tr>
                                <th>Jabatan</th>
                                <td>{{ $employee->position->nama_jabatan ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $employee->email }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Telepon</th>
                                <td>{{ $employee->nomor_telepon }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <td>{{ $employee->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $employee->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Masuk</th>
                                <td>{{ $employee->tanggal_masuk }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if ($employee->status == 'Aktif')
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Nonaktif</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning me-2">Edit Data</a>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
            </div>
        </div>
    </div>
@endsection
