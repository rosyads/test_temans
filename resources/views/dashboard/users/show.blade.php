@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h2 class="mb-3">User Details</h2>

                <a href="/users" class="btn btn-success"><span data-feather="arrow-left"></span> Back to User List</a>
                <a href="/users/{{ $user['uid'] }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                <form action="/users/{{ $user['uid'] }}" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
                </form>

                @if ($user['avatarUrl'] != "null")
                    <div>
                        <img src="{{ $user['avatarUrl'] }}" alt="{{ $user['name'] }}" class="img-fluid mt-3" height="200px" width="200px">
                    </div>
                @else
                    <div>
                        <img src="/img/profile.png" alt="{{ $user['name'] }}" class="img-fluid mt-3" height="200px" width="200px">
                    </div>
                @endif

                <dl class="row">
                    <dt class="col-sm-3">Nama</dt>
                    <dd class="col-sm-9">{{ $user['name'] }}</dd>

                    <dt class="col-sm-3">Email</dt>
                    <dd class="col-sm-9">{{ $user['email'] }}</dd>

                    <dt class="col-sm-3">No. Handphone</dt>
                    @if ($user['mobileNumber'] != "null")
                        <dd class="col-sm-9">{{ $user['mobileNumber'] }}</dd>
                    @else
                        <dd class="col-sm-9">-</dd>
                    @endif

                    <dt class="col-sm-3">Jenis Kelamin</dt>
                    @if ($user['gender'] != 'null')
                        <dd class="col-sm-9">{{ $user['gender'] }}</dd>
                    @else
                        <dd class="col-sm-9">-</dd>
                    @endif

                    <dt class="col-sm-3">Alamat</dt>
                    @if ($user['address'] != 'null')
                        <dd class="col-sm-9">{{ $user['address'] }}</dd>
                    @else
                        <dd class="col-sm-9">-</dd>
                    @endif

                    <dt class="col-sm-3">Department</dt>
                    @if ($user['department'] != 'null')
                        <dd class="col-sm-9">{{ $user['department'] }}</dd>
                    @else
                        <dd class="col-sm-9">-</dd>
                    @endif

                    <dt class="col-sm-3">Role</dt>
                    @if ($user['admin'])
                        <dd class="col-sm-9">Admin</dd>
                    @else
                        <dd class="col-sm-9">User</dd>
                    @endif

                    <dt class="col-sm-3">Tipe User</dt>
                    <dd class="col-sm-9">{{ $user['profile'] }}</dd>
                </dl>

            </div>
        </div>
    </div>
@endsection