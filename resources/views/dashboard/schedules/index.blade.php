@extends("dashboard.layouts.main")

@section("head_scripts")
    <link href='fullcalendar/main.css' rel='stylesheet' />
    <script src='fullcalendar/main.js'></script>
    <script>

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var eventsSchedule = @json($schedules);
        console.log(eventsSchedule);
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: eventsSchedule,
            eventClick: function(info) {
                window.location.href = "/schedules/"+info.event.id;

            }
        });
        calendar.render();
    });

    </script>
@endsection

@section("container")
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            Schedules
        </h1>
    </div>

    {{-- {{ dd($schedules['data']) }} --}}

    @if (session()->has("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session("success") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <a href="/schedules/create" class="btn btn-primary mb-3">Add new Schedules</a>
    <div id='calendar'></div>
    
@endsection