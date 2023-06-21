@extends('layouts.master-login')


@section('content')
<div class="authincation-content">
    <div class="row no-gutters">
        <div class="col-xl-12">
            <div class="auth-form">
                <div class="text-center mb-3">
                    <a href="index.html"><img src="images/logo-full.png" alt=""></a>
                </div>
                <h4 class="text-center mb-4">Sign in your account</h4>
                <form action="index.html">
                    <div class="mb-3">
                        <label class="mb-1"><strong>Email</strong></label>
                        <input type="email" class="form-control" value="hello@example.com">
                    </div>
                    <div class="mb-3">
                        <label class="mb-1"><strong>Password</strong></label>
                        <input type="password" class="form-control" value="Password">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection