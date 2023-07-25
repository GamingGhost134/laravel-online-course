<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laravel Online Course - Login</title>
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
                                href="{{url('/')}}">Home</a></li>
                        <li class="list-inline-item text-white h3 font-secondary nasted">Login</li>
                    </ul>
                    <p class="text-lighten mb-0">Login to your account and start your learning journey.</p>
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
                        <h2 class="login-text">Login</h2>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="/login" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" id="email"
                                    placeholder="Enter Your Email Address" class="form-control" required
                                    value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" id="password" placeholder="Enter Your Password"
                                    class="form-control" required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>
                            <div class="form-group text-center">
                                <a href="/forgot-password" class="text-primary">Forgot Password?</a>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
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
</body>

</html>
