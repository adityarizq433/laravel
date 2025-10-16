@extends('master')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Kehadiran Pegawai</h1>

        <a href="{{ route('attendances.create') }}" class="btn btn-primary mb-3">Catat Kehadiran</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Pegawai</th>
                        <th>Tanggal</th>
                        <th>Waktu Masuk</th>
                        <th>Waktu Keluar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($attendances as $attendance)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $attendance->employee->nama_lengkap ?? 'N/A' }}</td>
                        {{-- Memformat tanggal menggunakan Carbon --}}
                        <td>{{ \Carbon\Carbon::parse($attendance->tanggal)->format('d M Y') }}</td>

                        {{-- PERBAIKAN UTAMA DIMULAI DI SINI --}}

                        {{-- 1. Tambahkan data Waktu Masuk --}}
                        <td>{{ date('H:i', strtotime($attendance->waktu_masuk)) }}</td>

                        {{-- 2. Tambahkan data Waktu Keluar --}}
                        <td>{{ date('H:i', strtotime($attendance->waktu_keluar)) }}</td>

                        {{-- 3. Pindahkan data Status Absensi ke kolom yang benar --}}
                        <td>{{ $attendance->status_absensi }}</td>

                        {{-- Kolom Aksi sekarang berada di urutan ke-7, sesuai dengan header --}}
                        <td>
                            <a href="{{ route('attendances.edit', $attendance->id) }}" class="btn btn-sm btn-warning text-white">Edit</a>

                            <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Hapus data kehadiran ini?')">Hapus</button>
                            </form>
                        </td>
                        {{-- PERBAIKAN UTAMA SELESAI DI SINI --}}

                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada data kehadiran.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
