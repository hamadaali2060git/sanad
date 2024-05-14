@extends('layout.front.main')
@section('content')
<!-- start signup -->
@php
if(session()->get('locale')){
$langg=session()->get('locale');
App::setLocale($langg);
}else{
$langg=app()->getLocale();
App::setLocale($langg);
}
@endphp
<section class="form-section">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-4">
                <h6>
                    <!-- Sign Up and Start Learning  -->
                    <!-- تسجيل الدخول -->
                    {{__('front.Log In')}}
                </h6>
                <hr>
                @if(session()->has('message'))
                @include('admin.includes.alerts.success')
                @endif

                @if(Session::has('errorss'))
                <span class="text-danger">{{Session::get('errorss')}}</span>
                @endif



                <form method="POST" action="{{route('instructorlogin')}}">
                    @csrf
                    <div class="form-group">
                        <!-- <p class="text-small mb-2"> <span class="font-weight-bold  text-danger">Note:</span> Type your full name as you wish to print the certificates later, it cannot be modified after subscribing</p> -->

                    </div>

                    <div class="form-group">
                        <i class="fas fa-envelope icon"></i>
                        <input type="email" name="email" class="form-control" placeholder="{{__('front.Email')}}">
                        @error('email')
                        <strong>{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group">
                        <i class="fas fa-lock icon"></i>
                        <input type="password" name="password" class="form-control"
                            placeholder="{{__('front.Password')}}">
                        @error('password')
                        <strong>{{ $message }}</strong>
                        @enderror
                    </div>




                    <button type="submit" class="w-100 btn header-btn text-large font-weight-bold mb-4">
                        <!-- Sign Up  -->
                        {{__('front.Log In')}}
                    </button>





                </form>

                <hr>

                <div class="text-center">
                    <p>{{__('front.You dont have an account')}}<a href="{{url('student-signup')}}"
                            class="main-color font-weight-bold">{{__('front.SignUp')}}</a>
                    </p>
                </div>


            </div>





        </div>
    </div>
</section>
<!-- end signup -->
@endsection