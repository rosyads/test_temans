@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            Edit Customer Data
        </h1>
    </div>

    <div class="col-lg-8">
        @if (session()->has("updateError"))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session("updateError") }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <form action="/customers/{{ $customer->id }}" method="post" class="mb-5">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Customer Name</label>
                <input type="type" name="name" class="form-control @error('name')
                    is-invalid
                @enderror" id="name" value="{{ $customer->name, old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            <div class="mb-3">
                <label for="address" class="form-label">Customer Address</label>
                <input type="type" name="address" class="form-control @error('address')
                    is-invalid
                @enderror" id="address" value="{{ $customer->address, old('address') }}">
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

            <button type="submit" class="btn btn-primary">Update Customer Data</button>
        </form>
    </div>
@endsection