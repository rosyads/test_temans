@extends("dashboard.layouts.main")

@section("container")
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            Outlet
        </h1>
    </div>

    @if (session()->has("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session("success") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive col-lg-8">
        <a href="/outlets/create" class="btn btn-primary mb-3">Tambah Outlet</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode Outlet</th>
                    <th scope="col">Nama Outlet</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aktif</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- {{ dd(key($users)) }} --}}
                @foreach ($outlets as $outlet)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $outlet->KdOutlet }}</td>
                        <td>{{ $outlet->NmOutlet }}</td>
                        <td>{{ $outlet->Alamat }}</td>
                        @if($outlet->Aktif)
                            <td>Aktif</td>
                        @else 
                            <td>Tidak Aktif</td>
                        @endif
                        <td>
                            {{-- <a href="/outlets/{{ $outlet->id }}" class="badge bg-info"><span data-feather="eye"></span></a> --}}
                            <a href="/outlets/{{ $outlet->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                            <form action="/outlets/{{ $outlet->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus: {{ $outlet->NmOutlet }}?')">
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