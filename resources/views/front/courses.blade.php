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
<section class="">
    <div class="container">
        <!-- <div class="row"> -->
            <!-- <main class="col-12 col-lg-12 left-sidebar bg-white mb-5 pt-5 pb-5"> -->
            <!-- ١ start My Courses -->
            <div class="mb-4">

                <div class="row">
                    <div class="col-12"><br>
                        <h6 class="#course- text-extra-dark-gray font-weight-600 title-bg">
                            <!-- My Courses -->
                          @if($category)

                           @if($langg=='ar')
                             {{$category->title_ar}}
                           @else
                             {{$category->title_en}}
                           @endif
                          @endif
                        </h6>

                    </div>
                </div>

                <div class="row featured-courses">
                    <!-- start features box item -->
                    @foreach ($courses as $_item)
                    <div class="col-12 col-lg-3 col-md-6">

                        <a href="{{url('course/'.$_item->slug.'/'.$_item->id)}}">
                            <img src="{{asset('img/courses/'.$_item->image) }}" alt="">
                        </a>

                        <a href="{{url('course/'.$_item->slug.'/'.$_item->id)}}">
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
                                    <span>30 فرد</span>
                                </div>
                                <hr />
                                <div class="featured-date mb-2">
                                    <i class="far fa-money-bill-alt"></i>
                                    <!-- <span>1000 RQ</span> -->
                                    <span>1000 ريال قطري</span>
                                </div>

                            </div>
                        </a>
                    </div>
                    @endforeach
                    <!-- end features box item -->


                </div>
            </div>

            <!-- ١ end My Courses -->


            <!-- </main> -->
        <!-- </div> -->

    </div>

</section>
@endsection
