@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-cafe">
            <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0">Daftar Meja Restoran</h5>
                <a href="{{ route('tables.create') }}" class="btn btn-primary btn-cafe">
                    <i class="bi bi-plus-lg"></i> Tambah Meja
                </a>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-alert="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
                    @forelse($tables as $table)
                    <div class="col">
                        <div class="card h-100 card-cafe {{ $table->status == 'occupied' ? 'border-danger' : 'border-success' }}" style="border-width: 2px;">
                            <div class="card-body text-center p-4">
                                <div class="display-4 fw-bold mb-2 {{ $table->status == 'occupied' ? 'text-danger' : 'text-success' }}">
                                    <i class="bi bi-door-closed"></i> {{ $table->table_number }}
                                </div>
                                <h6 class="text-muted">Kapasitas: {{ $table->capacity }} Orang</h6>
                                <div class="mt-3">
                                    @if($table->status == 'available')
                                        <span class="badge rounded-pill bg-success px-3">Tersedia</span>
                                    @else
                                        <span class="badge rounded-pill bg-danger px-3">Terisi</span>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer bg-transparent border-0 d-flex justify-content-center gap-2 pb-3">
                                <a href="{{ route('tables.edit', $table) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                                <form action="{{ route('tables.destroy', $table) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus meja?')">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center py-5 text-muted">
                        <i class="bi bi-grid-3x3-gap fs-1 d-block mb-2"></i>
                        Belum ada meja yang terdaftar.
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
