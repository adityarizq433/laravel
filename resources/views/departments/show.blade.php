@extends('master')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Detail Departemen</h1>
        <div class="card">
            <div class="card-header bg-primary text-white">
                Informasi Departemen
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $department->id }}</p>
                <p><strong>Nama Departemen:</strong> {{ $department->nama ?? $department->nama_departemen }}</p>
                <p><strong>Dibuat pada:</strong> {{ $department->created_at->format('d M Y, H:i') }}</p>
                <p><strong>Diperbarui pada:</strong> {{ $department->updated_at->format('d M Y, H:i') }}</p>
            </div>
        </div>
        <a href="{{ route('departments.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar</a>
    </div>
@endsection
