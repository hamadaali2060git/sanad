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
     <!-- start banner -->
     <section class="about-banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>{{__('front.Learn Through Sanad')}}</h2>
                </div>

            </div>
        </div>
    </section>
     <!-- end banner -->


    <!-- start about -->
    <section>
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <img src="{{asset('img/settings/'.$contact->image) }}" class="img-fluid">
                </div>

                <div class="col-md-6 mt-3">
                    <h6 class="font-weight-600 text-dark">{{__('front.about sanad')}}</h6>
                    <p>
                        @if($langg=='ar')
                          {{$setting->desc_ar }}
                        @else
                          {{$setting->desc_en}}
                        @endif
                    </p>

                    <!-- <p>
                        After online learning changed his life, Eren partnered with
                        co-founders Oktay Caglar and Gagan Biyani toward a common goal:
                        to make quality education more accessible and improve lives through learning.

                    </p> -->

                </div>





            </div>
        </div>
    </section>
    <!-- end about -->
@endsection
