@extends('layout.front.main')
@section('content')
<!-- start banner  -->
<section class="parallax course-details">
    <div class="container">
        <div class="row">

            <div class="col-md-9">

                <!-- <div class="breadcrumb mt-4 pt-1">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Courses</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#" class="main-color">Python</a></li>
                        </ul>
                    </div> -->
                <div style="    height: 670px;
                    position: absolute;
                    width: 100%;
                    left: 5%;
                    padding: 0;
                    margin-top: 25px;
                    color: #232323;">

                    <div class="image-container2 popup-gallery">
                        <a class="video" href="{{asset('img/courses/video/'.$course->video) }}">

                            <div class="image-overlay">
                                <h6><i class="fas fa-play-circle"></i></h6>
                                <p>Preview this course</p>
                            </div>
                            <img src="{{asset('img/courses/'.$course->image) }}">
                        </a>
                    </div>

                </div>
                <!-- <h2>
                        2021 Complete Python Bootcamp From Zero to Hero in Python
                    </h2>

                    <p>
                        Learn Python like a Professional Start from the basics and go all the way to creating your own
                        applications and games

                    </p>
                    <div class="mb-3">
                        <button class="btn btn-best text-capitalize mr-2">Bestseller </button>
                        <span class="pr-1">4.6 </span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>

                    <p>Created by <a href="#" class="instructor_link">Ahmed Mohammed</a> 
                        <span class="text-small text-light">(Egyptian)</span></p>

                    <span class="mr-5"><i class="fas fa-exclamation-circle"></i> Last updated 3/2021</span>

                    <span><i class="fas fa-globe"></i> English</span>

                    <p class="mt-4">
                        <a href="#" class="btn btn-outline-light mr-2"> <i class="fas fa-heart"></i> Wishlist</a>

                        <a href="#" class="btn btn-outline-light mr-2"> <i class="fas fa-share"></i> Share</a>

                        <a href="#" class="btn btn-outline-light">Gift this course</a>

                    </p> -->




            </div>

            <div class="col-md-3 course-details-white">

                <!-- <div class="image-container2 popup-gallery">
                        <a class="video" href="https://www.youtube.com/watch?v=WvhQhj4n6b8">

                            <div class="image-overlay">
                                <h6><i class="fas fa-play-circle"></i></h6>
                                <p>Preview this course</p>

                            </div>

                            <img src="img/categories/design.jpg">
                        </a>
                    </div> -->
                <div class="course-desc" id="course-desc">
                    <h5>{{$course->title}}</h5>
                    <!-- <h5>1000 L.E </h5>  -->
                    <!-- <del>1500 L.E</del> -->
                    <!-- <p class="text-danger"><i class="fas fa-stopwatch"></i> 2 days left at this price!
                        </p> -->



                    <ul class="p-0 pt-4">
                        <h6>تتضمن هذه الدورة:</h6>
                        <li class="row">
                            <div class="col-1"><i class="fab fa-youtube"></i></div>
                            <div class="col-10">
                                <p> سعر الدورة : {{$course->price}} ر.ق</p>
                            </div>
                        </li>
                        <li class="row">
                            <div class="col-1"><i class="far fa-file"></i></div>
                            <div class="col-10">
                                <p>لغة الدورة التدريبية: {{$course->language}}</p>
                            </div>
                        </li>
                        <li class="row">
                            <div class="col-1"><i class="fas fa-calendar-alt"></i></div>
                            <div class="col-10">
                                <p>تاريخ بداية الدورة : {{$course->date}}</p>
                            </div>
                        </li>
                        <li class="row">
                            <div class="col-1"><i class="fas fa-infinity"></i></div>
                            <div class="col-10">
                                <p> وقت الدورة :{{$course->time}}</p>
                            </div>
                        </li>
                        <li class="row">
                            <div class="col-1"><i class="fas fa-code"></i></div>
                            <div class="col-10">
                                <p> عدد أيام الدورة : {{$course->duration}}</p>
                            </div>
                        </li>
                        <!-- <li class="row">
                                <div class="col-1"><i class="fas fa-infinity"></i></div>
                                <div class="col-10">
                                    <p>lifetime access</p>
                                </div>
                            </li>
                            <li class="row">
                                <div class="col-1"><i class="fas fa-mobile-alt"></i></div>
                                <div class="col-10">
                                    <p>Access on mobile and TV</p>
                                </div>
                            </li>
                            <li class="row">
                                <div class="col-1"><i class="fas fa-certificate"></i></div>
                                <div class="col-10">
                                    <p> Certificate of completion</p>
                                </div>
                            </li> -->
                    </ul>
                    @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                    @if(Auth::guard('instructors')->user())
                    @if(!$courses_joined)
                    <a href="{{url('courses/joined/'.$course->course_instructor->id.'/'.$course->id)}}"
                        class="btn header-btn w-100"> أشترك الان - {{$course->price}} ر.ق </a>
                    @else
                    <p class="btn header-btn w-100"> مشترك بالفعل
                    </p>
                    @endif
                    @else
                    <a href="{{route('user-login')}}" class="btn header-btn w-100"> أشترك
                        الان - {{$course->price}} ر.ق </a>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>
<!-- end banner -->


<!-- start course details -->
<section class="overview-section">
    <div class="container">
        <div class="row">

            <main class="col-12 col-lg-9 left-sidebar md-margin-60px-bottom  ">
                <div class="col-12  p-2">
                    <h6>محاور الدورة</h6>
                    <ul class="list-unstyled">
                        <div class="row">
                            @foreach ($course->course_subtitle as $subtitle)
                            <li class=" pb-2">
                                <a href="signup.html" class="btn mahawir-btn2 mr-2 mr-2">{{$subtitle->name}}</a>
                            </li>
                            @endforeach
                            <!-- <li class=" pb-2">
                                    <a href="signup.html" class="btn mahawir-btn2 mr-2 mr-2"> الوعي الذاتي</a>
                                </li>
                                <li class=" pb-2">
                                    <a href="signup.html" class="btn mahawir-btn2 mr-2 " >الخطابة العامة</a>
                                </li>
                                <li class=" pb-2">
                                    <a href="signup.html" class="btn mahawir-btn2 mr-2 " >الحافز</a>
                                </li>
                                <li class=" pb-2">
                                    <a href="signup.html" class="btn mahawir-btn2 mr-2 mr-2">التدرب</a>
                                </li> -->
                        </div>
                    </ul>
                </div>
                <!-- <div class="col-12 bg-light p-4">
                        <h6>محاور الدورة</h6>
                        <ul class="list-unstyled">
                            <div class="row">

                                <li class="col-md-6 pb-2">
                                    <div class="row">
                                        <div class="col-md-1"><i class="far fa-check-circle"></i>
                                        </div>
                                        <div class="col-md-10">الحافز
                                        </div>
                                    </div>
                                </li>
                                <li class="col-md-6 pb-2"> <i class="far fa-check-circle"></i> الحافز
                                </li>
                                <li class="col-md-6 pb-2"> <i class="far fa-check-circle"></i> التدرب
                                </li>
                                <li class="col-md-6 pb-2"><i class="far fa-check-circle"></i> الوعي الذاتي
                                </li>
                                <li class="col-md-6 pb-2"> <i class="far fa-check-circle"></i> التطور الذاتي
                                </li>
                            </div>
                        </ul>
                    </div> -->

                <div class="mt-2 col-12 bg-light p-4">
                    <h6>شرح توضيحي عن الدورة
                    </h6>

                    <p>{{$course->description}}
                        <!-- لوريم إيبسوم هو ببساطة نص وهمي من صناعة الطباعة والتنضيد. لقد كان لوريم إيبسوم هو النص الوهمي القياسي في هذه الصناعة منذ القرن السادس عشر، عندما أخذت طابعة غير معروفة لوح الكتابة وخلطته لصنع نموذج كتاب. لقد صمدت ليس فقط لخمسة قرون، بل قفزت أيضًا إلى التنضيد الإلكتروني، وبقيت دون تغيير بشكل أساسي -->
                    </p>
                </div>

                <div class="mt-2 col-12 bg-light p-4">
                    <h6>متطلبات الدورة
                    </h6>

                    <ul class="pl-4">
                        @foreach ($course->course_requirements as $requirements)
                        <li class=" pb-2">
                            {{$requirements->name}}
                        </li>
                        @endforeach
                        <!-- <li>
                                لوريم إيبسوم هو ببساطة نص وهمي من صناعة الطباعة والتنضيد. 
                            </li>
                            <li>
                                لقد كان لوريم إيبسوم هو النص الوهمي القياسي في هذه الصناعة منذ القرن السادس عشر.
                            </li> -->
                    </ul>
                </div>


                <div class="mt-2 col-12  p-1">
                    <h6> مميزات الدورة الاونلاين
                    </h6>

                    <ul class="pl-4">
                        <li class="row">
                            <div class="col-1">
                                <i class="fas fa-code"></i>
                            </div>
                            <div class="col-10">
                                <p> الوصول لمحتوى الدورة من أي مكان، وفي أي وقت.</p>
                            </div>
                        </li>
                        <li class="row">
                            <div class="col-1">
                                <i class="far fa-file"></i>
                            </div>
                            <div class="col-10">
                                <p>تعلم على وتيرتك الخاصة</p>
                            </div>
                        </li>
                        <li class="row">
                            <div class="col-1">
                                <i class="fas fa-code"></i>
                            </div>
                            <div class="col-10">
                                <p>شهادة إتمام الدورة.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-12 mt-1">
                    <h6> مقدم الدورة

                    </h6>

                    <div class="row">
                        <div class="col-md-2 mb-4">
                            <img src="{{asset('img/profiles/profile.png') }}" class="rounded-circle instructor-img">
                        </div>
                        <div class="col-md-10">
                            <h6 class="font-weight-normal mb-2"><a href="#"
                                    class="main-color">{{$course->course_instructor->name}}
                                </a></h6>
                            <p class="font-weight-bold  text-dark mb-2">عن المدرب</p>

                            <a href="{{url('chat/'.$course->course_instructor->id.'/create')}}" class="">
                                تواصل مع المدرب
                                <!-- <i class="fas fa-rocketchat"></i> -->
                            </a>
                            <p>{{$course->course_instructor->detail}}
                            </p>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <!-- <a href="#"><i class="fas fa-flag"></i> Report</a> -->
                    </div>

                </div>
                <!-- <div class="col-12 mt-5">
                        <h6>Recently Added Courses

                        </h6>


                        <div class="row mb-4">

                            <div class="col-lg-7 col-md-6 col-12">
                                <div class="row">

                                    <div class="col-lg-4 col-sm-4 col-5">
                                        <div class="course-img">
                                            <a href="#">
                                                <img src="img/categories/design.jpg">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-8 col-7">
                                        <div class="course-name">
                                            <a href="#">
                                                Travel Hacking -Smart &amp; Fun Travel
                                            </a>
                                        </div>
                                        <div class="course-update">Last Updated 23rd April 2020</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-1 col-4">
                                <div class="course-user">
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-user"></i></li>
                                        <li>0</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-4">

                                <div class="course-currency text-right">
                                    <ul class="list-unstyled">
                                        <li class="rate">500 L.E</li>
                                        <li class="rate"><s>1000 L.E</s></li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-2 col-4">
                                <div class="course-rate text-right">
                                    <ul class="list-unstyled">
                                        <li>
                                            <div class="heart">
                                                <a href="#" title="heart">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="row mb-4">

                            <div class="col-lg-7 col-md-6 col-12">
                                <div class="row">

                                    <div class="col-lg-4 col-sm-4 col-5">
                                        <div class="course-img">
                                            <a href="#">
                                                <img src="img/categories/development.jpg">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-8 col-7">
                                        <div class="course-name">
                                            <a href="#">
                                                Travel Hacking -Smart &amp; Fun Travel
                                            </a>
                                        </div>
                                        <div class="course-update">Last Updated 23rd April 2020</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-1 col-4">
                                <div class="course-user">
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-user"></i></li>
                                        <li>0</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-4">

                                <div class="course-currency text-right">
                                    <ul class="list-unstyled">
                                        <li class="rate">500 L.E</li>
                                        <li class="rate"><s>1000 L.E</s></li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-2 col-4">
                                <div class="course-rate text-right">
                                    <ul class="list-unstyled">
                                        <li>
                                            <div class="heart">
                                                <a href="#" title="heart">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="row mb-4">

                            <div class="col-lg-7 col-md-6 col-12">
                                <div class="row">

                                    <div class="col-lg-4 col-sm-4 col-5">
                                        <div class="course-img">
                                            <a href="#">
                                                <img src="img/categories/design.jpg">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-8 col-7">
                                        <div class="course-name">
                                            <a href="#">
                                                Travel Hacking -Smart &amp; Fun Travel
                                            </a>
                                        </div>
                                        <div class="course-update">Last Updated 23rd April 2020</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-1 col-4">
                                <div class="course-user">
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-user"></i></li>
                                        <li>0</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-4">

                                <div class="course-currency text-right">
                                    <ul class="list-unstyled">
                                        <li class="rate">500 L.E</li>
                                        <li class="rate"><s>1000 L.E</s></li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-2 col-4">
                                <div class="course-rate text-right">
                                    <ul class="list-unstyled">
                                        <li>
                                            <div class="heart">
                                                <a href="#" title="heart">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="row mb-4">

                            <div class="col-lg-7 col-md-6 col-12">
                                <div class="row">

                                    <div class="col-lg-4 col-sm-4 col-5">
                                        <div class="course-img">
                                            <a href="#">
                                                <img src="img/categories/development.jpg">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-8 col-7">
                                        <div class="course-name">
                                            <a href="#">
                                                Travel Hacking -Smart &amp; Fun Travel
                                            </a>
                                        </div>
                                        <div class="course-update">Last Updated 23rd April 2020</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 col-md-1 col-4">
                                <div class="course-user">
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-user"></i></li>
                                        <li>0</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-4">

                                <div class="course-currency text-right">
                                    <ul class="list-unstyled">
                                        <li class="rate">500 L.E</li>
                                        <li class="rate"><s>1000 L.E</s></li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-2 col-4">
                                <div class="course-rate text-right">
                                    <ul class="list-unstyled">
                                        <li>
                                            <div class="heart">
                                                <a href="#" title="heart">
                                                    <i class="far fa-heart"></i>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div> -->
            </main>


        </div>
    </div>
</section>
<!-- end course details -->

@endsection