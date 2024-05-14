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
                         {{__('front.instructors')}}
                      </h6>

                  </div>
              </div>
                <div class="row ">
                    @foreach ($instructors as $_item)
                    <div class="bg-light p-3 pt-4 mb-3 bg-white text-center">

                        <img src="{{asset('img/profiles/students/'.$_item->photo) }}" class="img-thumbnail profile-img-edit">

                        <div class="image-upload">
                            <label for="file-input">
                                <i class="fas fa-pen"></i>
                            </label>

                            <input id="file-input" type="file" />
                        </div>

                        <p class="text-bold-500 text-dark text-extra-large mb-3">{{$_item->name}}</p>

                        <p class="text-medium2">{{$_item->email}}</p>

                    </div>
@endforeach
                </div>
            </div>

            <!-- ١ end My Courses -->


            <!-- </main> -->
        <!-- </div> -->

    </div>

</section>
@endsection
