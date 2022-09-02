@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            Users
        </h1>
    </div>

    <div class="col-lg-8">
        @if (session()->has("registerError"))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session("registerError") }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <form action="/users" method="post" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="name" name="name" class="form-control @error('name')
                    is-invalid
                @enderror" id="name" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

            <div class="mb-3">  
              <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email')
                    is-invalid
                @enderror" id="email" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">  
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control @error('password')
                    is-invalid
                @enderror" id="password" value="{{ old('password') }}">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">  
                <label for="phone" class="form-label">Phone Number</label>
                <input type="phone" name="phone" class="form-control @error('phone')
                      is-invalid
                  @enderror" id="phone" value="{{ old('phone') }}">
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3"></textarea>
            </div>

            <div class="mb-3 form-check">
                <label class="form-check-label" for="admin">Admin?</label>
                <input type="checkbox" class="form-check-input @error('admin')
                    is-invalid
                @enderror" name="admin" id="admin" value="true">
                @error('admin')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <Label for="gender">Gender</Label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender1" value="Pria">
                    <label class="form-check-label" for="gender1">
                    Pria
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender2" value="Wanita">
                    <label class="form-check-label" for="gender2">
                    Wanita
                    </label>
                </div>
                @error('gender')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="department" class="form-label">Department</label>
                <select class="form-select" name="department_id">
                    <option selected>Department</option>
                    @foreach ($departments as $department)
                        @if (old('department_id') == $department['id'])
                            <option value="{{ $department['id'] }}" selected>{{ $department['nama_department'] }}</option>    
                        @else
                            <option value="{{ $department['id'] }}">{{ $department['nama_department'] }}</option>    
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="department" class="form-label">User Profile</label>
                <select class="form-select" name="userProfile_id">
                    <option selected>User Profile</option>
                    @foreach ($userProfiles as $userProfile)
                        @if (old('userProfile_id') == $userProfile['id'])
                            <option value="{{ $userProfile['id'] }}" selected>{{ $userProfile['nama_profile'] }}</option>    
                        @else
                            <option value="{{ $userProfile['id'] }}">{{ $userProfile['nama_profile'] }}</option>    
                        @endif
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Tambah User</button>
        </form>
    </div>
@endsection