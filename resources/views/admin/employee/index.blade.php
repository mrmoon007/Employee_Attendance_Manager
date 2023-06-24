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
                    <div class="card-header">
                        <h4 class="card-title">Recent Payments Queue</h4>
                        <form action="{{ route('admin.employee.index') }}" method="GET">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="m-1">
                                        <input type="text" class="form-control input-default " placeholder="search with full name and contat name">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <select name="status" class="m-1 default-select form-control wide mb-3" style="display: none;">
                                        <option value="">choose</option>
                                        <option value="active">Active</option>
                                        <option value="pending">Pending</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <button class="m-1 btn btn-primary" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Contact Name</th>
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
                                            <td>
                                                @forelse ($employee?->contacts as $contact)
                                                   <div>
                                                    {{ $contact->contact_name }}
                                                   </div>
                                                @empty
                                                    No data available
                                                @endforelse
                                            </td>
                                            <td>{{ $employee?->details?->gender }}</td>
                                            <td>{{ $employee?->status }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                            class="fas fa-pencil-alt"></i></a>
                                                    <a href="{{ route('admin.employee.show', $employee->id) }}" class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                            class="fas fa-eye"></i></a>

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
