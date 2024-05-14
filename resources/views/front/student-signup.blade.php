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

                    {{__('front.Register and start learning')}}
                </h6>
                <hr>
                @if(session()->has('message'))
                @include('admin.includes.alerts.success')
                @endif

                @if(Session::has('errorss'))
                <span class="text-danger">{{Session::get('errorss')}}</span>
                @endif
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>خطا</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="POST" action="{{route('student-signup-post')}}">
                    @csrf
                    <div class="form-group">
                        <!-- <p class="text-small mb-2"> <span class="font-weight-bold  text-danger">Note:</span> Type your full name as you wish to print the certificates later, it cannot be modified after subscribing</p> -->

                    </div>
                    <div class="form-group">
                        <i class="fas fa-user icon"></i>
                        <input type="text" name="first_name" class="form-control"
                            placeholder="{{__('front.first Name')}}">
                    </div>
                    <div class="form-group">
                        <i class="fas fa-user icon"></i>
                        <input type="text" name="last_name" class="form-control"
                            placeholder="{{__('front.last Name')}}">
                    </div>

                    <div class="form-group">
                        <i class="fas fa-envelope icon"></i>
                        <input type="email" name="email" class="form-control" placeholder="{{__('front.Email')}}">
                    </div>

                    <div class="form-group">
                        <i class="fas fa-lock icon"></i>
                        <input type="password" name="password" class="form-control"
                            placeholder="{{__('front.Password')}}">
                    </div>

                    <div class="form-group">
                        <i class="fas fa-lock icon"></i>
                        <input type="password" name="confirm_password" class="form-control"
                            placeholder="{{__('front.Confirm Password')}}">
                    </div>
                    <div class="form-group">
                        <i class="fa fa-phone icon"></i>
                        <input type="number" name="mobile" class="form-control" placeholder="{{__('front.Phone No')}}">
                    </div>
                    <!-- <div class="form-group mt-4 mb-4">
                            <div class="row">

                                <div class="col-2 pr-0 mt-2">
                                    <input type="checkbox" class="form-control">
                                </div>
                                <div class="col-10 pl-0">
                                    <small class="text-small">By signing up, you agree to our
                                        <a href="terms-of-use.html" class="main-color"> Terms of Use </a> and
                                        <a href="privacy-policy.html"
                                            class="main-color">Privacy Policy.</a>
                                    </small>
                                </div>

                            </div>

                        </div> -->
                    <!-- <div class="form-group mt-4 mb-4">
                            <div class="row">
                                <div class="col-2 pr-0 mt-2">
                                    <input type="checkbox" class="form-control">
                                </div>
                                <div class="col-10 pl-0">
                                    <small class="text-small">من خلال التسجيل ، فإنك توافق على
                                        <a href="terms-of-use.html" class="main-color"> شروط الاستخدام </a> و
                                        <a href="privacy-policy.html"
                                            class="main-color"> سياسة الخصوصية.</a>
                                    </small>
                                </div>
                            </div>
                        </div> -->

                    <button type="submit" class="w-100 btn header-btn text-large font-weight-bold mb-4">
                        <!-- Sign Up  -->
                        {{__('front.SignUp')}}
                    </button>





                </form>

                <hr>

                <div class="text-center">

                    <p>{{__('front.Already have an account')}}<a href="{{url('user-login')}}"
                            class="main-color font-weight-bold">{{__('front.Log In')}}</a>
                    </p>

                </div>


            </div>





        </div>
    </div>
</section>
<!-- end signup -->


@endsection