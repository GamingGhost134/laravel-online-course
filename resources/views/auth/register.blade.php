<!-- register.blade.php -->
<!DOCTYPE html>
<html>

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
                                href="{{ url('/') }}">Home</a></li>
                        <li class="list-inline-item text-white h3 font-secondary nasted">Register</li>
                    </ul>
                    <p class="text-lighten mb-0">Create an account to get started with our courses.</p>
                </div>
            </div>
        </div>1
    </section>
    <!-- /page title -->

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h2 class="register-text">Register</h2>
                    </div>
                    <div class="card-body">
                        <form action="/register" method="POST" onsubmit="return validateForm()">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" id="name" placeholder="Enter Your Full Name"
                                    class="form-control" required value="{{ old('name') }}">
                                <span id="nameError" class="text-danger"></span> <!-- Add id for error message -->
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" id="email"
                                    placeholder="Enter Your Email Address" class="form-control" required
                                    value="{{ old('email') }}">
                                <span id="emailError" class="text-danger"></span>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" id="password" placeholder="Enter Your Password"
                                    class="form-control" required>
                                <span id="passwordError" class="text-danger"></span> <!-- Add id for error message -->
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" id="confirmPassword"
                                    placeholder="Confirm Your Password" class="form-control" required>
                                <span id="confirmPasswordError" class="text-danger"></span>
                                <!-- Add id for error message -->
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </form>
                        <p class="mt-3 text-center text-secondary">Already have an account? <a href="/login"
                                class="text-primary">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('../footer')
    @include('../scripts')
    <script src="{{ asset('js/register.js') }}"></script>
</body>

</html>
