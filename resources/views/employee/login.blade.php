@extends('layouts.master-login')

@section('page_title', 'Employee login form')

@section('content')
<div class="authincation-content">
    <div class="row no-gutters">
        <div class="col-xl-12">
            <div class="auth-form">
                <div class="text-center mb-3">
                    <a href="index.html"><img src="images/logo-full.png" alt=""></a>
                </div>
                <h4 class="text-center mb-4">Sign in your account</h4>
                <form action="{{ route('employee.authenticate') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="mb-1"><strong>Email</strong></label>
                        <input type="email" name="email" class="form-control" placeholder="hello@example.com">
                    </div>
                    <div class="mb-3">
                        <label class="mb-1"><strong>Password</strong></label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="row d-flex justify-content-between mt-4 mb-2">
                        <div class="mb-3">
                           <div class="form-check custom-checkbox ms-1">
                                <input type="checkbox" name="remember" value="true" class="form-check-input" id="basic_checkbox_1">
                                <label class="form-check-label" for="basic_checkbox_1">Remember my preference</label>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                    </div>
                    <div class="text-center mt-2">
                        <a href="{{ route('google.login') }}" class="btn btn-light btn-block">Login with Google</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection