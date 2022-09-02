@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            Products
        </h1>
    </div>

    <div class="col-lg-3">
        @if (session()->has("registerError"))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session("registerError") }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <form action="/products" method="post" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="KdProduk" class="form-label">Kode Produk</label>
                <input type="KdProduk" name="KdProduk" class="form-control @error('KdProduk')
                    is-invalid
                @enderror" id="KdProduk" value="{{ old('KdProduk') }}">
                @error('KdProduk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="NmProduk" class="form-label">Nama Produk</label>
                <input type="NmProduk" name="NmProduk" class="form-control @error('NmProduk')
                    is-invalid
                @enderror" id="NmProduk" value="{{ old('NmProduk') }}">
                @error('NmProduk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="HNA" class="form-label">HNA</label>
                <input type="HNA" name="HNA" class="form-control @error('HNA')
                    is-invalid
                @enderror" id="HNA" value="{{ old('HNA') }}">
                @error('HNA')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

            <button type="submit" class="btn btn-primary">Tambah Produk</button>
        </form>
    </div>
@endsection