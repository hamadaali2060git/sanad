@php
if(session()->get('locale')){
$langg=session()->get('locale');
App::setLocale($langg);
}else{
$langg=app()->getLocale();
App::setLocale($langg);
}
@endphp
<nav class="navbar navbar-default bootsnav navbar-top header-dark background-transparent white-link navbar-expand-lg">
    <div class="container nav-header-container">
        <!-- start logo -->
        <div class="col-auto pl-lg-0">
            <a href="{{url('/')}}" title="" class="logo">
                <h1>Sanad</h1>
            </a>
        </div>
        <!-- end logo -->
        <div class="col accordion-menu pr-2 pr-md-3">
            <button type="button" class="navbar-toggler collapsed" data-toggle="collapse"
                data-target="#navbar-collapse-toggle-1">
                <span class="sr-only">toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-collapse collapse justify-content-start" id="navbar-collapse-toggle-1">
                <ul id="accordion" class="nav navbar-nav no-margin #course- text-normal">
                    <li class="dropdown simple-dropdown"><a href="#"> {{__('front.Categories')}} <i
                                class="fa fa-chevron-down" aria-hidden="true"></i></a>
                        <i class="fas fa-angle-down dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
                        <!-- start sub menu -->
                        <ul class="dropdown-menu" role="menu">
                            @foreach ($allcategories as $_item)
                            <li class="dropdown simple-dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown"
                                    href="{{url('category/'.$_item->slug)}}">

                                    @if($langg=='ar')
                                    {{$_item->title_ar}}
                                    @else
                                    {{$_item->title_en}}
                                    @endif
                                    <i class="fas fa-angle-left dropdown-toggle" data-toggle="dropdown"
                                        aria-hidden="true"></i>
                                </a>
                            </li>
                            @endforeach
                            <!-- <li class="dropdown simple-dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                            الفنون والتصميم
                                            <i class="fas fa-angle-left dropdown-toggle" data-toggle="dropdown"
                                                aria-hidden="true"></i>
                                        </a>
                                    </li>

                                    <li class="dropdown simple-dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                            المهارات الاساسية
                                            <i class="fas fa-angle-left dropdown-toggle" data-toggle="dropdown"
                                                aria-hidden="true"></i>
                                        </a>
                                    </li>

                                    <li class="dropdown simple-dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                            إدارة الأعمال
                                            <i class="fas fa-angle-left dropdown-toggle" data-toggle="dropdown"
                                                aria-hidden="true"></i>
                                        </a>


                                    </li>
                                    <li class="dropdown simple-dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                            إدارة الأعمال
                                            <i class="fas fa-angle-left dropdown-toggle" data-toggle="dropdown"
                                                aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="dropdown simple-dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                            إدارة الأعمال
                                            <i class="fas fa-angle-left dropdown-toggle" data-toggle="dropdown"
                                                aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="dropdown simple-dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                             ريادة الأعمال
                                            <i class="fas fa-angle-left dropdown-toggle" data-toggle="dropdown"
                                                aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="dropdown simple-dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                             تنمية مهارات الابناء
                                            <i class="fas fa-angle-left dropdown-toggle" data-toggle="dropdown"
                                                aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="dropdown simple-dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                             الصحة والحياة
                                            <i class="fas fa-angle-left dropdown-toggle" data-toggle="dropdown"
                                                aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li class="dropdown simple-dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                             إدارة المبيعات والتسويق
                                             <i class="fas fa-angle-left dropdown-toggle" data-toggle="dropdown"
                                             aria-hidden="true"></i>
                                        </a>
                                    </li> -->

                        </ul>
                    </li>




                    <div class="header-search-div d-lg-none d-md-block d-block">

                        <form action="#" class="header-search">
                            <input placeholder="{{__('front.Search for online courses')}}" class="header-search-input">
                            <button type="submit" class="header-search-submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>

                    </div>



                </ul>

                <div class="header-search-div">

                    <form action="#" class="header-search">
                        <input placeholder="{{__('front.Search')}}" class="header-search-input">
                        <button type="submit" class="header-search-submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>

                </div>


            </div>
        </div>
        <div class="col-auto d-lg-flex pl-0">


            <!-- <div class="notification dropdown d-lg-flex d-md-none d-none">
                        <a class="dropdown-toggle mr-4  main-color text-extra-large" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-bell"></i>
                            <span class="number">1</span>
                    </a>
                        <div class="dropdown-menu pb-0" aria-labelledby="dropdownMenuButton">
                            <div class="pt-2 pb-1">
                                <p class="pl-2">Notifications</p>

                                <div class="bg-light p-2">
                                    <div class="row">

                                        <div class="col-5">
                                            <img src="{{asset('img/profiles/students/'.Auth::guard('instructors')->user()->photo) }}" class="img-fluid">

                                        </div>
                                        <div class="col-7 pl-0">
                                            <p class="text-small">
                                                What our students have to say
                                                What our students have to say
                                            </p>
                                        </div>

                                    </div>
                                </div>


                            </div>
                            <hr>


                            <div class=" bg-light text-center pb-2">
                                <a class="dropdown-item main-color font-weight-600 text-medium" href="#">
                                    Clear all
                                </a>
                            </div>


                        </div>
                    </div> -->


            <!-- <a href="mywishlist.html" class="d-lg-flex d-md-none d-none mr-2 mt-3 main-color text-extra-large"><i
                            class="far fa-heart"></i>
                        </a> -->

            <div class="profile-menu mt-1">

                <div class="dropdown">
                    <button class="btn btn-transparent dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset('img/profiles/students/'.Auth::guard('instructors')->user()->photo) }}"
                            alt="">
                    </button>
                    <div class="dropdown-menu pb-0" aria-labelledby="dropdownMenuButton">
                        <!-- <div class="pl-3 pr-3 pt-2 pb-1">
                                    <img src="{{asset('img/profiles/students/'.Auth::guard('instructors')->user()->photo) }}" class="profile-img">
                                    <span class="text-medium2 pl-2">{{Auth::guard('instructors')->user()->name}}</span>
                                    <p class="text-small ml-5 pl-2">{{Auth::guard('instructors')->user()->email}}</p>
                                </div>
                                <hr> -->

                        <a class="dropdown-item" href="{{url('my-profile')}}">
                            <i class="fas fa-user pr-2"></i> {{__('front.My Profile')}}
                        </a>

                        <!-- <a class="dropdown-item" href="mywishlist.html">
                                    <i class="fas fa-heart pr-2"></i> My Wishlist
                                </a> -->

                        <a class="dropdown-item" href="{{url('my-courses')}}">
                            <i class="fas fa-video pr-2"></i> {{__('front.My Courses')}}
                        </a>

                        <!-- <a class="dropdown-item" href="become-instructor.html">
                                    <i class="fas fa-chalkboard-teacher pr-2"></i> Become an Instructor
                                </a> -->

                        <div class=" bg-light text-center mt-2 pt-2 pb-2">
                            <a class="dropdown-item main-color font-weight-600 text-medium"
                                href="{{ route('signoutinstructors') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('signoutinstructors') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </div>




                    </div>
                </div>

            </div>


        </div>
    </div>
</nav>