@extends("dashboard.layouts.main")

@section("container")
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            Reports
        </h1>
    </div>

    @if (session()->has("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session("success") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive col-lg-8">
        <a href="/reports/create" class="btn btn-primary mb-3">Submit new report</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Jenis Pekerjaan</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- {{ dd(key($users)) }} --}}
                {{-- {{ dd($products) }} --}}
                {{-- {{ session('admin') }} --}}
                @foreach ($reports as $report)
                    @if (session('admin'))
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $report->submit_date }}</td>
                            <td>{{ $report->pekerjaan }}</td>
                            <td>{{ $report->lokasi }}</td>
                            <td>
                                <a href="/reports/{{ $report->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                                <a href="/reports/{{ $report->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                                <form action="/reports/{{ $report->id }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure to delete this report?')">
                                        <span data-feather="x-circle"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @else
                        @if ($report->user_id == $uid)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $report->submit_date }}</td>
                                <td>{{ $report->pekerjaan }}</td>
                                <td>{{ $report->lokasi }}</td>
                                <td>
                                    <a href="/reports/{{ $report->id }}" class="badge bg-info"><span data-feather="eye"></span></a>
                                    <a href="/reports/{{ $report->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                                    <form action="/reports/{{ $report->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure to delete this report?')">
                                            <span data-feather="x-circle"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endif 
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection