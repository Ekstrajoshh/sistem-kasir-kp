@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-cafe">
            <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0">Daftar Menu Kafe</h5>
                <a href="{{ route('menus.create') }}" class="btn btn-primary btn-cafe">
                    <i class="bi bi-plus-lg"></i> Tambah Menu
                </a>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Menu</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($menus as $menu)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="bg-light rounded p-2 text-primary">
                                            <i class="bi bi-cup-hot fs-4"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold">{{ $menu->name }}</div>
                                            <small class="text-muted">{{ Str::limit($menu->description, 50) }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-info text-dark">{{ $menu->category->name }}</span></td>
                                <td class="fw-bold text-primary">Rp {{ number_format($menu->price, 0, ',', '.') }}</td>
                                <td>
                                    @if($menu->is_available)
                                        <span class="badge bg-success">Tersedia</span>
                                    @else
                                        <span class="badge bg-danger">Habis</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('menus.edit', $menu) }}" class="btn btn-outline-warning btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('menus.destroy', $menu) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin ingin menghapus menu ini?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    <i class="bi bi-menu-button-wide fs-1 d-block mb-2"></i>
                                    Belum ada menu.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
