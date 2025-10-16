@extends('master')

@section('title', 'Daftar Pegawai')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Pegawai</h1>
        <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus-circle"></i> Tambah Pegawai
        </a>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>Departemen</th>
                        <th>Jabatan</th>
                        <th>Email</th>
                        <th>Nomor Telepon</th>
                        <th>Tanggal Masuk</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->nama_lengkap }}</td>
                            <td>{{ $employee->department?->nama ?? ($employee->department?->nama_departemen ?? 'N/A') }}</td>
                            <td>{{ $employee->position?->nama_jabatan ?? 'N/A' }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->nomor_telepon }}</td>
                            <td>{{ $employee->tanggal_masuk }}</td>
                            <td>
                                @if (strtolower($employee->status) == 'aktif')
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-danger">Nonaktif</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('employees.show', $employee->id) }}"
                                    class="btn btn-sm btn-info text-white">
                                    Detail
                                </a>
                                <a href="{{ route('employees.edit', $employee->id) }}"
                                    class="btn btn-sm btn-warning text-white">
                                    Edit
                                </a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus data {{ $employee->nama_lengkap }}?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if (isset($employees) && method_exists($employees, 'links'))
        <div class="d-flex justify-content-center">
            {{ $employees->links() }}
        </div>
    @endif
@endsection
