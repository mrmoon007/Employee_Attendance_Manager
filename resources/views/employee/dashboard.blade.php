@extends('employee.layouts.master')

@section('css')
    
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-6 col-xxl-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="card progress-card">
                        <div class="card-body d-flex">
                            <div class="me-auto">
                                <h4 class="card-title">Total Transactions</h4>
                                <div class="d-flex align-items-center">
                                    <h2 class="fs-38 mb-0">98k</h2>
                                    <div class="text-success transaction-caret">
                                        <i class="fas fa-sort-up"></i>
                                        <p class="mb-0">+0.5%</p>
                                    </div>
                                </div>
                            </div>		
                            <div class="progress progress-vertical-bottom" style="min-height:110px;min-width:10px;">
                                <div class="progress-bar bg-primary" style="width:10px; height:40%;" role="progressbar">
                                    <span class="sr-only">40% Complete</span>
                                </div>
                            </div>
                            <div class="progress progress-vertical-bottom" style="min-height:110px;min-width:10px;">
                                <div class="progress-bar bg-primary" style="width:10px; height:55%;" role="progressbar">
                                    <span class="sr-only">55% Complete</span>
                                </div>
                            </div>
                            <div class="progress progress-vertical-bottom" style="min-height:110px;min-width:10px;">
                                <div class="progress-bar bg-primary" style="width:10px; height:80%;" role="progressbar">
                                    <span class="sr-only">80% Complete</span>
                                </div>
                            </div>
                            <div class="progress progress-vertical-bottom" style="min-height:110px;min-width:10px;">
                                <div class="progress-bar bg-primary" style="width:10px; height:50%;" role="progressbar">
                                    <span class="sr-only">50% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Invoice Remaining</h4>
                            <div class="d-flex align-items-center">
                                <div class="me-auto">
                                    <div class="progress mt-4" style="height:10px;">
                                        <div class="progress-bar bg-primary progress-animated" style="width: 45%; height:10px;" role="progressbar">
                                            <span class="sr-only">60% Complete</span>
                                        </div>
                                    </div>
                                    <p class="fs-16 mb-0 mt-2"><span class="text-danger">-0,8% </span>from last month</p>
                                </div>
                                <h2 class="fs-38">854</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mt-2">Invoice Sent</h4>
                            <div class="d-flex align-items-center mt-3 mb-2">
                                <h2 class="fs-38 mb-0 me-3">456</h2>
                                <span class="badge badge-success badge-xl">+0.5%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mt-2">Invoice Compeleted</h4>
                            <div class="d-flex align-items-center mt-3 mb-2">
                                <h2 class="fs-38 mb-0 me-3">1467</h2>
                                <span class="badge badge-danger badge-xl">-6.4%</span>
                            </div>
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