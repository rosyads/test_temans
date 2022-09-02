@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            Customers
        </h1>
    </div>

    <div class="col-lg-3">
        @if (session()->has("registerError"))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session("registerError") }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <form action="/customers" method="post" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Customer Name</label>
                <input type="type" name="name" class="form-control @error('name')
                    is-invalid
                @enderror" id="name" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            <div class="mb-3">
                <label for="address" class="form-label">Customer Address</label>
                <input type="type" name="address" class="form-control @error('address')
                    is-invalid
                @enderror" id="address" value="{{ old('address') }}">
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

            <button type="submit" class="btn btn-primary">Add New Customer</button>
        </form>
    </div>
@endsection