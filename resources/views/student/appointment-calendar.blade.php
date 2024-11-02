@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Add this dropdown section before the calendar -->
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="schedule-select">View Schedule of:</label>
            <select class="form-control" id="schedule-select">
                <option value="" selected disabled>Please select here</option>
                <!-- Add your options here -->
            </select>
        </div>
    </div>

    <!-- Calendar display -->
    <div id="calendar" class="small-calendar"></div>

    <!-- Booking form (hidden initially) -->
    <form id="booking-form" method="POST" action="{{ route('appointments.book') }}" style="display: none;">
        @csrf
        <input type="hidden" name="appointment_id" id="appointment_id">
        <button type="submit" class="btn btn-primary mt-3">Confirm Appointment</button>
    </form>

    @if (session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            height: 'auto', // Adjust height if needed
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: [
                @foreach($appointments as $appointment)
                    {
                        id: '{{ $appointment->id }}',
                        title: 'Available Slot',
                        start: '{{ $appointment->date }}T{{ $appointment->time }}',
                        backgroundColor: '#28a745',
                        borderColor: '#28a745',
                        textColor: '#ffffff'
                    },
                @endforeach
            ],
            eventClick: function(info) {
                document.getElementById('appointment_id').value = info.event.id;
                document.getElementById('booking-form').style.display = 'block';
            }
        });

        calendar.render();
    });
</script>

<!-- FullCalendar CSS -->
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
<!-- FullCalendar JS -->
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>

<style>
    .small-calendar {
        max-width: 1000px; /* Adjust width as needed */
        height: 400px; /* Adjust height as needed */
        margin: 0 auto; /* Center the calendar */
    }
</style>
@endsection