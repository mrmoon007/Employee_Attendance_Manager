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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Create</a></li>
            </ol>
        </div>

        <!-- row -->
        <form action="{{ route('employee.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-xl-7 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Basic Info</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">First Name</label>
                                        <input type="text" name="first_name" class="form-control" placeholder="1234 Main St">
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" name="full_name" class="form-control" placeholder="Full name">
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="example@gmail.com">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Status</label>
                                        <select name="status" id="inputState" class="default-select form-control wide">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Contacts info</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Contact Name</label>
                                        <input type="text" name="contact_name" class="form-control" placeholder="1234 Main St">
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Contact Email</label>
                                        <input type="email" name="contact_email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Address</label>
                                        <input type="text" name="address" class="form-control" placeholder="1234 Main St">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Photo</label>
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file" name="photo" class="form-file-input form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Gender</label>
                                        <div class="input-group">
                                            <label class="radio-inline me-3"><input type="radio" name="optradio"> Option 1</label>
                                        <label class="radio-inline me-3"><input type="radio" name="optradio"> Option 1</label>
                                        <label class="radio-inline me-3"><input type="radio" name="optradio"> Option 1</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" style="float: right">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js')

@endsection
