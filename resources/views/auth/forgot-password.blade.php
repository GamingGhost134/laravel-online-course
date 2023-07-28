<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laravel Online Course - Forgot Password</title>
    @include('../css')
</head>

<body>
    @include('../header')

    <!-- page title -->
    <section class="page-title-section overlay" data-background="{{ asset('images/backgrounds/page-title.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-inline custom-breadcrumb mb-2">
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary"
                                href="{{ url('/') }}">Home</a></li>
                        <li class="list-inline-item text-white h3 font-secondary nasted">Forgot-Password</li>
                    </ul>
                    <p class="text-lighten mb-0">Enter your email address to reset your password.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- /page title -->

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h2 class="forgot-text">Forgot Password</h2>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                <p class="text-center">{{ session('success') }}</p>
                            </div>
                        @endif
                        <form action="/forgot-password" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" id="email"
                                    placeholder="Enter Your Registered Email Address " class="form-control" required
                                    value="{{ old('email') }}">
                                    <span id="emailError" class="text-danger"></span>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Send Reset Password Link</button>
                        </form>
                        <p class="mt-3 text-center text-secondary">Don't have an account? <a href="/register"
                                class="text-primary">Register here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('../footer')
    @include('../scripts')
    <script src="{{ asset('js/forgot-password.js')}}"></script>
</body>

</html>
