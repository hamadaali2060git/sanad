@extends('layout.front.main')
@section('content')	
    <!-- start signup -->
    <section class="form-section">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-4">
                    <h6>
                        <!-- Sign Up and Start Learning  -->
                        سجل وابدأ التعلم
                    </h6>
                    <hr>


                    <form>
                        <div class="form-group">
                            <!-- <p class="text-small mb-2"> <span class="font-weight-bold  text-danger">Note:</span> Type your full name as you wish to print the certificates later, it cannot be modified after subscribing</p> -->
                           
                        </div>
                        <div class="form-group">
                            <i class="fas fa-user icon"></i>
                            <input type="text" class="form-control" placeholder="first Name">
                        </div>
                        <div class="form-group">
                            <i class="fas fa-user icon"></i>
                            <input type="text" class="form-control" placeholder="last Name">
                        </div>

                        <div class="form-group">
                            <i class="fas fa-envelope icon"></i>
                            <input type="email" class="form-control" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <i class="fas fa-lock icon"></i>
                            <input type="password" class="form-control" placeholder="Password">
                        </div>

                        <div class="form-group">
                            <i class="fas fa-lock icon"></i>
                            <input type="password" class="form-control" placeholder="Confirm Password">
                        </div>
                        <div class="form-group">
                            <i class="fa fa-phone icon"></i>
                            <input type="number" class="form-control" placeholder="mobile">
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
                        <div class="form-group mt-4 mb-4">
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
                        </div>

                        <button type="submit" class="w-100 btn header-btn text-large font-weight-bold mb-4">
                            <!-- Sign Up  -->
                            تسجيل
                        </button>





                    </form>

                    <hr>

                    <div class="text-center">

                        <p>Already have an account? <a href="login.html" class="main-color font-weight-bold">Log In</a>
                        </p>

                    </div>


                </div>





            </div>
        </div>
    </section>
    <!-- end signup -->
@extends('layout.front.main')
@section('content')	

@endsection