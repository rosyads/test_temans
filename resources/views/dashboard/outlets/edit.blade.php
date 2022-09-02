@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            Edit Outlet
        </h1>
    </div>

    <div class="col-lg-8">
        @if (session()->has("updateError"))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session("updateError") }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <form action="/outlets/{{ $outlet->id }}" method="post" class="mb-5">
            @method('put')
            @csrf

            <div class="mb-3">  
                <label for="KdOutlet" class="form-label">Kode Outlet</label>
                <input type="KdOutlet" name="KdOutlet" class="form-control @error('KdOutlet')
                    is-invalid
                @enderror" id="KdOutlet" value="{{ $outlet->KdOutlet, old('KdOutlet') }}">
                @error('KdOutlet')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">  
                <label for="NmOutlet" class="form-label">Outlet</label>
                <input type="NmOutlet" name="NmOutlet" class="form-control @error('NmOutlet')
                    is-invalid
                @enderror" id="NmOutlet" value="{{ $outlet->NmOutlet, old('NmOutlet') }}">
                @error('NmOutlet')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Alamat" class="form-label">Alamat</label>
                <input type="Alamat" name="Alamat" class="form-control @error('Alamat')
                    is-invalid
                @enderror" id="Alamat" value="{{ $outlet->Alamat, old('Alamat') }}">
                @error('Alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="Aktif" name="Aktif"
                @if($outlet->Aktif)
                    checked
                @endif
                > 
                <label class="form-check-label" for="Aktif">
                  Toko Aktif
                </label>
                @error('Aktif')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

            <button type="submit" class="btn btn-primary">Update Outlet</button>
        </form>
    </div>
@endsection