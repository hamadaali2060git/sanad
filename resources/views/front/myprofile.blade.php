@extends('layout.front.main')
@section('content')
    <!-- start banner  -->
    <section class="parallax banner">
        <div class="container">
            <div class="row justify-content-center">

                <h3 class="text-white font-weight-600">{{__('front.My Profile')}}</h3>

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

                <main class="bg-light col-12 col-lg-9 left-sidebar bg-white mb-5">

                    <div class="form-section form-section-edit">

                        <h6>{{__('front.Personal Information')}}
                        </h6>
                        <hr>
                        @if (session('message'))
                                                    <div class="alert alert-success">
                                                        {{ session('message') }}
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
                        <form action="{{route('updateprofile')}}" method="POST"
                                    name="le_form"  enctype="multipart/form-data">
                                    @csrf


                            <div class="row mb-3">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" name="first_name" class="form-control" value="{{$user->first_name}}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" name="last_name" class="form-control" value="{{$user->last_name}}">
                                    </div>
                                </div>

                            </div>

                            <div class="row mb-3">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" value="{{$user->email}}" disabled>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="text" name="mobile" class="form-control" value="{{$user->mobile}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label> Bio</label>
                                        <textarea name="detail" rows="5" class="form-control">{{$user->detail}}
                                            </textarea>
                                    </div>
                                </div>

                            </div>



                            <!-- <div class="row mb-3">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="checkbox" name="" id=""  onclick="showpassword();">
                                        <label class="text-large font-weight-bold">Update Password</label>
                                    </div>
                                </div>

                            </div>

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

                            </div> -->

                            <div class="row mb-3 justify-content-end mr-2">

                                <button type="submit" class="btn header-btn text-medium font-weight-600">
                                {{__('front.save change')}}
                                </button>
                            </div>





                        </form>



                    </div>

                </main>

            </div>
        </div>
    </section>
    <!-- end My Profile -->
@endsection
