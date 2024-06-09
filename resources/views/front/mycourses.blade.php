@extends('layout.front.main')
@section('content')
<!-- start banner  -->
<section class="parallax banner">
    <div class="container">
        <div class="row justify-content-center">

            <h3 class="text-white font-weight-600">My Courses</h3>

        </div>
    </div>
</section>
<!-- end banner -->



<section class="bg-light">
    <div class="container">
        <div class="row">

            <aside class="col-12 col-lg-3 float-left">
                @include('layout.front.sidebar')
            </aside>


            <main class="col-12 col-lg-9 left-sidebar bg-white mb-5 pt-5 pb-5">


                <!-- start My Courses -->

                <div class="mb-4">
                    <div class="row">
                        <div class="col-12">
                            <h6 class="#course- text-extra-dark-gray font-weight-600 title-bg">
                                كورساتي </h6>

                        </div>
                    </div>
                    <div class="row featured-courses">
                        <!-- start features box item -->
                        @foreach ($courses as $key => $course)
                        <div class="col-12 col-lg-4 col-md-6">
                            <a href="{{url('course/'.$course->slug.'/'.$course->id)}}">
                                <img src="{{asset('img/courses/'.$course->image) }}" class="img-fluid">
                            </a>
                            <a href="{{url('course/'.$course->slug.'/'.$course->id)}}">
                                <div class="bg-light">

                                    <p class="text-dark font-weight-bold mb-2">{{$course->title}}</p>

                                    <div class="featured-date mb-2">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span>30 Jun</span>
                                    </div>


                                    <div class="featured-date mb-2">
                                        <i class="fas fa-money-bill-alt"></i>
                                        <span>1000 EGP</span>
                                    </div>

                                    <div>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>

                                </div>
                            </a>
                        </div>
                        <!-- end features box item -->
                        @endforeach

                    </div>
                </div>
                <!-- end My Courses -->



            </main>


        </div>

    </div>

</section>


@endsection