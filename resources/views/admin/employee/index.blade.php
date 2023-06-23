@extends('admin.layouts.master')

@section('page_title', 'Employees')

@section('paye_name_in_header', 'Employees')

@section('css')

@endsection

@section('content')
    <div class="container-fluid">


        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Employee</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">List</a></li>
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
                                        <th>Gender</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td><img class="rounded-circle" width="35"
                                                    src="{{ asset('images/' . $employee?->details?->photo) }}"
                                                    alt=""></td>
                                            <td>{{ $employee?->full_name }}</td>
                                            <td>{{ $employee?->email }}</td>
                                            <td>{{ $employee?->details?->gender }}</td>
                                            <td>{{ $employee?->status }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                            class="fas fa-pencil-alt"></i></a>

                                                    <form method="POST" action="{{ route('admin.employee.destroy', $employee->id) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="{{ route('admin.employee.destroy', $employee->id) }}" onclick="event.preventDefault();
                                                        this.closest('form').submit();" class="btn btn-danger shadow btn-xs sharp"><i
                                                            class="fa fa-trash"></i></a>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-end">
                                {{ $employees->links() }}
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
