@php
    // for date format
    use Carbon\Carbon;
@endphp

<!DOCTYPE html>

<html lang="en">

<head>

    <!-- Basic Page Needs
 ================================================== -->
    <meta charset="utf-8">
    <title>Laravel Online Course - Course</title>

    <!-- Mobile Specific Metas
 ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="author" content="Themefisher">
    <meta name="generator" content="Themefisher Educenter HTML Template v1.0">

    @include('../css')
</head>

<body>
    <!-- preloader start -->
    <div class="preloader">
        <img src="images/preloader.gif" alt="preloader">
    </div>
    <!-- preloader end -->

    <!-- header -->
    @include('../header')
    <!-- /header -->

    <!-- page title -->
    <section class="page-title-section overlay" data-background="images/backgrounds/page-title.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ul class="list-inline custom-breadcrumb mb-2">
                        <li class="list-inline-item"><a class="h2 text-primary font-secondary"
                                href="index.html">Home</a></li>
                        <li class="list-inline-item text-white h3 font-secondary nasted">Our Courses</li>
                    </ul>
                    <p class="text-lighten mb-0">Our courses offer a good compromise between the continuous assessment
                        favoured by some universities and the emphasis placed on final exams by others.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- /page title -->

    <!-- courses -->
    <section class="section">
        <div class="container">
            <!-- course list -->
            <div class="row">
                <!-- course item -->
                @foreach ($courses as $course)
                    <div class="col-lg-4 col-sm-6 mb-5">
                        <div class="card p-0 border-primary rounded-0 hover-shadow">
                            <img class="card-img-top rounded-0"
                                src="{{ asset('uploads/course/images/' . $course['image']) }}" alt="course thumb">
                            <div class="card-body d-flex flex-column">
                                <!-- Add d-flex and flex-column classes here -->
                                <ul class="list-inline mb-2">
                                    <li class="list-inline-item"><i
                                            class="ti-calendar mr-1 text-color"></i>{{ Carbon::parse($course['created_at'])->format('d M Y') }}
                                    </li>
                                    </li>
                                    <li class="list-inline-item"><a class="text-color"
                                            href="course-single.html">{{ $course['category'] }}</a></li>
                                </ul>
                                <a href="course-single.html">
                                    <h4 class="card-title">{{ $course['title'] }}</h4>
                                </a>
                                <p class="card-text flex-grow-1 mb-4"> {{ $course['description'] }}</p>
                                <!-- Add flex-grow-1 class to make the description expand and fill the remaining height -->
                                <a href="course-single.html" class="btn btn-primary btn-sm">Apply now</a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
            <!-- /course list -->

        </div>
    </section>
    <!-- /courses -->

    <!-- footer -->
    @include('../footer')
    <!-- /footer -->

    @include('../scripts')

</body>

</html>
