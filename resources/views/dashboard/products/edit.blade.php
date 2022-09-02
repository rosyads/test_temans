@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            Edit Produk
        </h1>
    </div>

    <div class="col-lg-8">
        @if (session()->has("updateError"))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session("updateError") }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <form action="/products/{{ $product->KdProduk }}" method="post" class="mb-5">
            @method('put')
            @csrf

            <div class="mb-3">  
                <label for="KdProduk" class="form-label">Kode Produk</label>
                <input type="KdProduk" name="KdProduk" class="form-control @error('KdProduk')
                    is-invalid
                @enderror" id="KdProduk" value="{{ $product->KdProduk, old('KdProduk') }}">
                @error('KdProduk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">  
                <label for="NmProduk" class="form-label">Produk</label>
                <input type="NmProduk" name="NmProduk" class="form-control @error('NmProduk')
                    is-invalid
                @enderror" id="NmProduk" value="{{ $product->NmProduk, old('NmProduk') }}">
                @error('NmProduk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">  
                <label for="HNA" class="form-label">HNA</label>
                <input type="HNA" name="HNA" class="form-control @error('HNA')
                    is-invalid
                @enderror" id="HNA" value="{{ $product->HNA, old('HNA') }}">
                @error('HNA')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Produk</button>
        </form>
    </div>
@endsection