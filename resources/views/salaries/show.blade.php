@extends('master')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Detail Pembayaran Gaji</h1>
        <div class="card">
            <div class="card-header bg-primary text-white">
    Rincian Gaji Periode {{ \Carbon\Carbon::parse($salary->periode_gaji)->format('F Y') }}
</div>
            <div class="card-body">
                <h4>Data Pegawai</h4>
                <p><strong>Nama Pegawai:</strong> {{ $salary->employee->nama_lengkap ?? 'N/A' }}</p>
                <hr>
                <h4>Rincian Penghasilan</h4>
                <ul class="list-group list-group-flush mb-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Gaji Pokok
                        <span>Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-light">
                        Tunjangan
                        <span class="text-success">Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total Penghasilan Kotor
                        <span>Rp {{ number_format($salary->gaji_pokok + $salary->tunjangan, 0, ',', '.') }}</span>
                    </li>
                </ul>
                <h4>Rincian Potongan</h4>
                <ul class="list-group list-group-flush mb-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-light">
                        Potongan
                        <span class="text-danger">Rp {{ number_format($salary->potongan, 0, ',', '.') }}</span>
                    </li>
                </ul>
                <hr>
                <h3>Total Gaji Bersih</h3>
                <p class="h4 text-success">
                    Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}
                </p>
            </div>
            <div class="card-footer">
                <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Kembali ke Daftar Gaji</a>
            </div>
        </div>
    </div>
@endsection
