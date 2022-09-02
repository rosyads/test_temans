@extends("dashboard.layouts.main")

@section("container")
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            Users
        </h1>
    </div>

    @if (session()->has("registerSuccess"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session("registerSuccess") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has("updateSuccess"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session("updateSuccess") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has("deleteSuccess"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session("deleteSuccess") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has("deleteError"))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session("deleteError") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive col-lg-8">
        <a href="/users/create" class="btn btn-primary mb-3">Add User</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- {{ dd(key($users)) }} --}}
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        @if ($user['admin'])
                            <td>Admin</td>
                        @else
                            <td>User</td>
                        @endif
                        <td>
                            <a href="/users/{{ $user['uid'] }}" class="badge bg-info"><span data-feather="eye"></span></a>
                            <a href="/users/{{ $user['uid'] }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                            <form action="/users/{{ $user['uid'] }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure to delete user: {{ $user['name'] }}?')">
                                    <span data-feather="x-circle"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection