@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1>Data Master Level</h1>
            <hr>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Form Tambah Level -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Form Tambah Level</h5>
                </div>
                <div class="card-body">
                    <form action="/level/add" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="level_kode" class="form-label">Kode Level</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('level_kode') is-invalid @enderror" 
                                        id="level_kode" 
                                        name="level_kode" 
                                        placeholder="Contoh: ADM, MNG, STF" 
                                        required>
                                    @error('level_kode')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="level_nama" class="form-label">Nama Level</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('level_nama') is-invalid @enderror" 
                                        id="level_nama" 
                                        name="level_nama" 
                                        placeholder="Contoh: Administrator" 
                                        required>
                                    @error('level_nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Tambah Level
                                </button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tabel Data Level -->
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Daftar Level ({{ count($levels) }} data)</h5>
                </div>
                <div class="card-body">
                    @if (count($levels) > 0)
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th width="50">No</th>
                                    <th width="100">Kode</th>
                                    <th>Nama Level</th>
                                    <th width="150">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($levels as $index => $level)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td><span class="badge bg-info">{{ $level->level_kode }}</span></td>
                                        <td><strong>{{ $level->level_nama }}</strong></td>
                                        <td>{{ $level->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-triangle"></i> Belum ada data level
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
