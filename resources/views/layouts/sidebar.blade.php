<!-- Sidebar -->
<aside class="main-sidebar" id="sidebar">
    <div class="sidebar-header">
        <img src="{{ asset('images/dep.png') }}" alt="Company Logo" class="sidebar-logo, img-fluid" style="max-height: 125px;">
    </div>
    <nav class="sidebar-nav">
        <ul>

        <li class="active"><a href="{{ route('dashboard') }}"><i class='bx bxs-dashboard'></i> <span>Dashboard</span></a></li>
            <li><a href="#"><i class='bx bx-bell'></i> <span>Notification</span></a></li>
            <li><a href="#"><i class='bx bx-chat'></i> <span>Inbox</span></a></li>
            @if(Auth::check() && Auth::user()->role === 'student')
                <li><a href="{{ route('student.appointments.calendar') }}"><i class='bx bx-calendar'></i> <span>Appointment</span></a></li>
            @endif
            <li><a href="#"><i class='bx bx-file'></i> <span>Documentation</span></a></li>
            <li><a href="#"><i class='bx bx-circle'></i> <span>Reports</span></a></li>
        </ul>
    </nav>
    <div class="sidebar-footer">

    </div>
</aside>
