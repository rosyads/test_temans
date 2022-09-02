@extends("dashboard.layouts.main")

@section("container")
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            Produk
        </h1>
    </div>

    @if (session()->has("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session("success") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive col-lg-8">
        <a href="/products/create" class="btn btn-primary mb-3">Tambah Produk</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode Produk</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">HNA</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- {{ dd(key($users)) }} --}}
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->KdProduk }}</td>
                        <td>{{ $product->NmProduk }}</td>
                        <td>{{ $product->HNA }}</td>
                        <td>
                            {{-- <a href="/products/{{ $product->id }}" class="badge bg-info"><span data-feather="eye"></span></a> --}}
                            <a href="/products/{{ $product->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                            <form action="/products/{{ $product->id }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus: {{ $product->NmProduk }}?')">
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