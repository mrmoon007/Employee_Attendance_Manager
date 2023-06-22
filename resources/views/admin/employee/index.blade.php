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
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Gender</th>
                                    <th>Education</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Joining Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img class="rounded-circle" width="35" src="images/profile/small/pic10.jpg" alt=""></td>
                                    <td>Shou Itou</td>
                                    <td>Regional Marketing</td>
                                    <td>Female</td>
                                    <td>B.COM., M.COM.</td>
                                    <td><a href="javascript:void(0);"><strong>123 456 7890</strong></a></td>
                                    <td><a href="javascript:void(0);"><strong>info@example.com</strong></a></td>
                                    <td>2011/08/14</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    
@endsection