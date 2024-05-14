@extends('layout.front.main')
@section('content')
@php
if(session()->get('locale')){
$langg=session()->get('locale');
App::setLocale($langg);
}else{
$langg=app()->getLocale();
App::setLocale($langg);
}
@endphp
<!-- start slider section -->
<article class="slider">
    @foreach ($sliders as $slider)
    <section class="slide">
        <img src="{{asset('img/sliders/'.$slider->image) }}" alt="">

        <div class="slide-content">
            <h2 class="slide-title">{{__('front.live Courses')}}</h2>
            <p class="slide-title">
                @if($langg=='ar')
                {{$slider->title_ar}}
                @else
                {{$slider->title_en}}
                @endif
                <br>
                <!-- Lorem Ipsum has been the industry's. -->
            </p>
        </div>
    </section>
    @endforeach
    <nav class="slider-nav">
        <span class="prev-slide"></span>
        <span class="next-slide"></span>
    </nav>
</article>
<!-- end slider section -->

<section class="">
    <div class="container">
        <!-- <div class="row"> -->
        <!-- <main class="col-12 col-lg-12 left-sidebar bg-white mb-5 pt-5 pb-5"> -->
        <!-- ١ start My Courses -->
        <div class="mb-4">
            @foreach ($categories as $category)
            <div class="row">
                <div class="col-12">
                    <h6 class="#course- text-extra-dark-gray font-weight-600 title-bg">
                        <!-- My Courses -->
                        @if($langg=='ar')
                        {{$category->title_ar}}
                        @else
                        {{$category->title_en}}
                        @endif

                    </h6>

                </div>
            </div>

            <div class="row featured-courses">
                <!-- start features box item -->
                @foreach ($category->courses as $_item)
                <div class="col-12 col-lg-3 col-md-6">
                    @if($langg=='ar')
                    <a href="{{url('course/'.$_item->slug_ar.'/'.$_item->id)}}">
                        @else
                        <a href="{{url('course/'.$_item->slug_en.'/'.$_item->id)}}">
                            @endif
                            <img src="{{asset('img/courses/'.$_item->image) }}" alt="">
                        </a>
                        @if($langg=='ar')
                        <a href="{{url('course/'.$_item->slug_en.'/'.$_item->id)}}">
                            @else
                            <a href="{{url('course/'.$_item->slug_en.'/'.$_item->id)}}">
                                @endif
                                <div class="bg-light">
                                    <p class="text-dark font-weight-bold mb-2">
                                        @if($langg=='ar')
                                        {{$_item->title_ar}}
                                        @else
                                        {{$_item->title_en}}
                                        @endif
                                    </p>
                                    <div class="featured-date mb-2">
                                        <!-- <i class="fas fa-user "></i> -->
                                        <i class="far fa-user"></i>
                                        <span>{{$_item->user_courses_joined_count}}
                                            @if($_item->user_courses_joined_count <= 1) {{__('front.person')}} @else
                                                {{__('front.persons')}} @endif </span>
                                    </div>
                                    <hr />
                                    <div class="featured-date mb-2">
                                        <i class="far fa-money-bill-alt"></i>
                                        <!-- <span>1000 RQ</span> -->
                                        <span>
                                            @if($_item->price !=0)
                                            {{$_item->price}} {{__('front.currency')}}
                                            @else
                                            {{__('front.free')}}
                                            @endif
                                        </span>
                                    </div>

                                </div>
                            </a>
                </div>
                @endforeach
                <!-- end features box item -->


            </div>
        </div>
        @endforeach
        <!-- ١ end My Courses -->


        <!-- </main> -->
        <!-- </div> -->

        <!-- start Zoom Meetings -->
        <!-- <div class="row">
            <div class="col-12">
                <h6 class="#course- text-extra-dark-gray font-weight-600 title-bg">
                    اعلانات عروض</h6>

            </div>
        </div>
        <div class="row">
            <div class=" swiper-slider-clients swiper-container">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="featured-courses">
                            <a href="#">
                                <img src="img/courses/word.jpg" class="img-fluid">
                            </a>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="featured-courses">
                            <a href="#">
                                <img src="img/courses/excel.webp" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="featured-courses">
                            <a href="#">
                                <img src="img/courses/PowerPoint.jpg" alt="">
                            </a>
                            <a href="#">
                                    <div class="bg-light">
                                        <p class="text-dark font-weight-bold mb-2"> PowerPoint
                                        </p>

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
                    </div>


                </div>
                <div class="swiper-pagination d-none"></div>
                <div class="swiper-button-next slider-long-arrow-white"></div>
                <div class="swiper-button-prev slider-long-arrow-white"></div>
            </div>
        </div> -->
        <!-- end Zoom Meetings -->
    </div>

</section>
@endsection