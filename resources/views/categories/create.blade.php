@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-cafe">
            <div class="card-header bg-white border-0 py-3">
                <h5 class="fw-bold mb-0">Tambah Kategori Baru</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fw-medium text-dark">Nama Kategori</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required placeholder="Contoh: Coffee, Tea, Snacks">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="d-flex gap-2 justify-content-end mt-4">
                        <a href="{{ route('categories.index') }}" class="btn btn-light text-dark">Batal</a>
                        <button type="submit" class="btn btn-primary btn-cafe px-4">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
