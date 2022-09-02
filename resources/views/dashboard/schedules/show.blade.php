@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            Schedule {{ $engineer }} untuk {{ $schedule->job_title }} di {{ $schedule->customer->name }}
        </h1>
    </div>

    <a href="/schedules" class="btn btn-success"><span data-feather="arrow-left"></span> Back to Schedule List</a>
    <a href="/schedules/{{ $schedule->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
    <form action="/schedules/{{ $schedule->id }}" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</button>
    </form>

    <div class="col-lg-8">
        @if (session()->has("registerError"))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session("registerError") }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <form action="/schedules" method="post" class="mb-5">
            @csrf
            {{-- {{ dd($users) }} --}}
            <div class="col d-flex">
                <dl class="col-sm-2 mt-3 me-5">
                    <dt class="col">Engineer Name</dt>
                    <dd class="col">{{ $engineer }}</dd>
                </dl>
            </div>
            <div class="col d-flex">
                <dl class="col-sm-2 mt-2 me-5">
                    <dt class="col">Nama Produk</dt>
                    <dd class="col">{{ $schedule->type->brand->name->name }}</dd>
                </dl>
                <dl class="col-sm-2 mt-2 me-5">
                    <dt class="col">Merk Produk</dt>
                    <dd class="col">{{ $schedule->type->brand->brand }}</dd>
                </dl>
                <dl class="col-sm-2 mt-2 me-5">
                    <dt class="col">Tipe Produk</dt>
                    <dd class="col">{{ $schedule->type->type }}</dd>
                </dl>
                <dl class="col-sm-2 mt-2 me-5">
                    <dt class="col">Serial Number</dt>
                    <dd class="col">{{ $schedule->serial_num }}</dd>
                </dl>
                <dl class="col-sm-2 mt-2 me-5">
                    <dt class="col">Version</dt>
                    <dd class="col">{{ $schedule->version }}</dd>
                </dl>
            </div>
            <div class="col d-flex">
                <dl class="col-sm-2 mt-2 me-5">
                    <dt class="col">Customer</dt>
                    <dd class="col">{{ $schedule->customer->name }}</dd>
                </dl>
            </div>
            <div class="col d-flex">
                <dl class="col-sm-2 mt-2 me-5">
                    <dt class="col">Jenis Pekerjaan</dt>
                    <dd class="col">{{ $schedule->job_title }}</dd>
                </dl>
            </div>
            <div class="col d-flex">
                <dl class="col-sm-2 mt-2 me-5">
                    <dt class="col">Berangkat</dt>
                    <dd class="col">{{ $schedule->date_depart }}</dd>
                </dl>
                <dl class="col-sm-2 mt-2 me-5">
                    <dt class="col">Sampai</dt>
                    <dd class="col">{{ $schedule->date_return }}</dd>
                </dl>
            </div>
        </form>
    </div>

@endsection

@section("scripts")
    <!-- Script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type='text/javascript'>
        $(document).ready(function(){
    
            // Product Change
            $('#products').change(function(){
        
                // Product id
                var id = $(this).val();
                console.log(id);
        
                // Empty the dropdown
                $('#brands').find('option').not(':first').remove();
                console.log('emptied brands');
                $('#types').find('option').not(':first').remove();
                console.log('emptied types');
        
                // AJAX request 
                $.ajax({
                    url: '/reports/getBrands/'+id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response){
                    var len = 0;
                    console.log(response['data']);
                    if(response['data'] != null){
                        len = response['data'].length;
                    }
        
                    if(len > 0){
                        // Read data and create <option >
                        for(var i=0; i<len; i++){
        
                            var id = response['data'][i].id;
                            var name = response['data'][i].brand;
        
                            var option = "<option value='"+id+"'>"+name+"</option>";
        
                            console.log(option);
                            $("#brands").append(option); 
                        }
                    }
        
                    }
                });
            });

            // Brand Change
            $('#brands').change(function(){
        
                // Brand id
                var id = $(this).val();
                console.log(id);

                // Empty the dropdown
                $('#types').find('option').not(':first').remove();
                console.log('emptied types');

                // AJAX request 
                $.ajax({
                    url: '/reports/getTypes/'+id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response){
                    var len = 0;
                    console.log(response['data']);
                    if(response['data'] != null){
                        len = response['data'].length;
                    }

                    if(len > 0){
                        // Read data and create <option >
                        for(var i=0; i<len; i++){

                            var id = response['data'][i].id;
                            var name = response['data'][i].type;

                            var option = "<option value='"+id+"'>"+name+"</option>";

                            console.log(option);
                            $("#types").append(option); 
                        }
                    }

                    }
                });
            });

        });
    </script>
@endsection