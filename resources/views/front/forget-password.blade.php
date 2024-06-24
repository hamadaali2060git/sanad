@extends('layout.front.main')
@section('content')

<section class="form-section">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-4">
                <h6>تغيير كلمة المرور</h6>
                <hr>


                <!-- <a href="#">

                        <div class="social-link facebook-link mb-3">
                            <i class="fab fa-facebook-f pr-3"></i>
                            <span>Continue with Facebook</span>
                        </div>
                    </a>


                    <a href="#">
                        <div class="social-link gmail-link mb-3">
                            <i class="fab fa-google pr-3"></i>
                            <span>Continue with Google</span>
                        </div>
                    </a>

                    <a href="#">
                        <div class="social-link gmail-link mb-3">
                            <i class="fab fa-apple pr-3"></i>
                            <span>Continue with Apple</span>
                        </div>

                    </a> -->
                @if(session()->has('message'))
                @include('admin.includes.alerts.success')
                @endif

                @if(Session::has('errorss'))
                <span class="text-danger">{{Session::get('errorss')}}</span>
                @endif

                <br><br>


                <form class="form-horizontal form-simple" novalidate method="POST"
                    action="{{route('forgot.password.post')}}">
                    @csrf
                    <div class="form-group">
                        <label for="email">{{__('front.Email')}}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required="" autofocus="">
                        @error('email')
                        <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-group m-0">
                        <button type="submit" class="btn btn-primary btn-block">{{__('front.send')}} </button>
                    </div>

                </form>










                <!-- <hr> -->
                <!-- <div class="text-center">

                        <p> {{__('front.dont have account')}}<a href="{{url('create/acount')}}" class="main-color font-weight-bold">{{__('front.sign up')}}</a>
                        </p>

                    </div> -->



            </div>





        </div>
    </div>
</section>
<!-- end login -->

@endsection