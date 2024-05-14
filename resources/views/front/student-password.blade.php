@extends('layout.front.main')
@section('content')
    <!-- start banner  -->
    <section class="parallax banner">
        <div class="container">
            <div class="row justify-content-center">

                <h3 class="text-white font-weight-600">My Profile</h3>

            </div>
        </div>
    </section>
    <!-- end banner -->


    <!-- start My Profile -->
    <section class="bg-light">
        <div class="container">
            <div class="row">

                <aside class="col-12 col-lg-3 float-left">
                     @include('layout.front.sidebar')
                </aside>

                <main class="col-12 col-lg-9 left-sidebar bg-white mb-5">

                    <div class="form-section form-section-edit">

                        <h6>{{__('front.Update Password')}}
                        </h6>
                        <hr>

                        @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if(session('errorss'))
                        <div class="alert alert-danger">
                            <ul>
                                {{ session('errorss') }}
                            </ul>
                        </div>
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
                        <form action="{{route('student-change-password')}}" method="POST" name="le_form">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{__('front.Current Password')}} </label><br>
                                    <i class="fas fa-lock icon" onclick="myFunction()" ></i>
                                    <input type="password" name="current-password" value="{{ old('current-password') }}"   class="form-control"  id="user-password">
                                </div>
                                 </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('front.New Password')}}</label><br>
                                        <i class="fas fa-lock icon" onclick="myFunction()" ></i>
                                        <input type="password" name="new-password" value="{{ old('current-password') }}" id="user-password-confirm"  class="form-control"  id="user-password">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 justify-content-end mr-2">
                                <button type="submit" class="btn header-btn text-medium font-weight-600">
                                {{__('front.save change')}}
                                </button>
                            </div>
                        </form>
                        <!-- <form>
                            <div class="row mb-3" id="HiddenField">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" value="123">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" value="123">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 justify-content-end mr-2">

                                <button type="submit" class="btn header-btn text-medium font-weight-600">
                                Update Profile
                                </button>
                            </div>
                        </form> -->
                  </div>
                </main>
            </div>
        </div>
    </section>
    <!-- end My Profile -->
@endsection
