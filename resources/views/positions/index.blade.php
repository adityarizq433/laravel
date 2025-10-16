@extends('master')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Jabatan</h1>
        <a href="{{ route('positions.create') }}" class="btn btn-primary mb-3">Tambah Jabatan</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Jabatan</th>
                        <th>Gaji Pokok</th>
                        <th style="width: 15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($positions as $position)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $position->nama_jabatan }}</td>
                            <td>Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('positions.edit', $position->id) }}"
                                    class="btn btn-sm btn-warning text-white">Edit</a>
                                <form action="{{ route('positions.destroy', $position->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus {{ $position->nama_jabatan }}?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Belum ada data jabatan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
