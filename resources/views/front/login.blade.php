@extends('front.master')
@section('content')
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <h1>login</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="container login-container mt-150 mb-150" >
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="login-form" >
                <form action="{{ url('client/post-login') }}" method="POST">
                    @csrf
                    <!-- Email Input -->
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required autofocus placeholder="Enter your email">
                    </div>

                    <!-- Password Input -->
                    <div class="form-group mb-4">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Enter your password">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100">Login</button>

                    <!-- Forgot Password -->
                    <div class="text-center mt-3">
                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
