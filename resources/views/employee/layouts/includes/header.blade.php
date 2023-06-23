<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">
                    <div class="dashboard_bar">
                        @yield('page_name_in_header', 'Dashboard')
                    </div>
                </div>
                <ul class="navbar-nav header-right">
                    @php
                        $attendance = App\Models\EmployeeAttendance::where('date', date('Y-m-d'))
                            ->whereEmployee_id(Auth::guard('employee')->user()->id)
                            ->whereNull('check_out_time')
                            ->latest()
                            ->first();
                    @endphp
                    <li class="nav-item">
                        @if ($attendance)
                            <a href="{{ route('employee.punch-out') }}"
                                class="btn btn-primary d-sm-inline-block d-none">Punch out</a>
                        @else
                            <a href="{{ route('employee.punch-in') }}"
                                class="btn btn-primary d-sm-inline-block d-none">Punch in</a>
                        @endif
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
