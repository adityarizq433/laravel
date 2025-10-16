@extends('master')

@section('content')
    <div class="container mt-5">
        <h1>Daftar Pembayaran Gaji</h1>
<a href="{{ route('salaries.create') }}" class="btn btn-primary mb-3">Tambah Pembayaran</a>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Pegawai</th>
                        <th>Periode</th>
                        <th>Gaji Pokok</th>
                        <th>Total Bersih</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($salaries as $salary)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $salary->employee->nama_lengkap ?? 'N/A' }}</td>
                            <td>{{ \Carbon\Carbon::parse($salary->periode_gaji ?? $salary->bulan_tahun)->format('M Y') }}</td>
                            <td>Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($salary->total_gaji_bersih ?? ($salary->gaji_pokok + $salary->tunjangan - $salary->potongan), 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('salaries.show', $salary->id) }}" class="btn btn-sm btn-info text-white">Detail</a>
                                <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-sm btn-warning text-white">Edit</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data gaji.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
