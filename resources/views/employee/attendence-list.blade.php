@extends('employee.layouts.master')

@section('page_title', 'Attendance list')

@section('paye_name_in_header', 'Attendance list')

@section('css')

@endsection

@section('content')
    <div class="container-fluid">


        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ route('employee.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Attendance List</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Punch In</th>
                                        <th>Punch Out</th>
                                        <th>Worked</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendances as $attendance)
                                        <tr>
                                            <td>{{ $loop?->index +1 }}</td>
                                            <td>{{ $attendance?->date }}</td>
                                            <td>{{ $attendance?->employee?->full_name }}</td>
                                            <td>{{ $attendance?->check_in_time }}</td>
                                            <td>{{ $attendance?->check_out_time }}</td>
                                            <td>{{ $attendance?->duration }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-end">
                                {{ $attendances->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
