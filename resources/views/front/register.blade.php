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

<div class="container register-container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="register-form">

                <h3 class="register-title">Create an Account</h3>

                <!-- Register Form -->
                <form action="{{ url('client/post-register') }}" method="POST">
                    @csrf

                    <!-- Name Input -->
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Full Name" value="{{ old('name') }}" required autofocus>
                    </div>

                    <!-- Email Input -->
                    <div class="form-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <input type="phone" class="form-control" name="phone" placeholder="phone" value="{{ old('phone') }}" required>
                    </div>
                    <!-- Password Input -->
                    <div class="form-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>

                    <!-- Confirm Password Input -->
                    <div class="form-group mb-3">
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="form-group mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="terms" id="terms" required>
                            <label class="form-check-label" for="terms">
                                I accept the <a href="#">Terms and Conditions</a>
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                    </div>

                    <!-- Already have an account -->
                    <div class="register-footer mt-3">
                        <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

