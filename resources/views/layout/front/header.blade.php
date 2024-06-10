<!-- start navigation -->
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



                    <li class="dropdown simple-dropdown"><a href="#">{{__('front.Categories')}} <i
                                class="fa fa-chevron-down" aria-hidden="true"></i></a>
                        <i class="fas fa-angle-down dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
                        <!-- start sub menu -->
                        <ul class="dropdown-menu" role="menu">
                            @foreach ($allcategories as $_item)
                            <li class="dropdown simple-dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown"
                                    href="{{url('category/'.$_item->slug_en)}}">
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
                        </ul>
                    </li>

                    <li class="d-lg-none d-md-block d-block">
                        <a href="{{url('student-signup')}}"> <i class="fas fa-user pr-1 pt-2"></i>{{__('front.SignUp')}}
                        </a>
                    </li>

                    <li class="d-lg-none d-md-block d-block">
                        <a href="{{url('user-login')}}">
                            <i class="fas fa-sign-in-alt pr-1 pt-2"></i>{{__('front.Log In')}}
                        </a>
                    </li>

                    <div class="header-search-div d-lg-none d-md-block d-block">

                        <form action="#" class="header-search">
                            <input placeholder="{{__('front.Search')}}" class="header-search-input">
                            <button type="submit" class="header-search-submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                    <!-- <a href="#" class="btn header-btn  d-lg-none d-md-block d-block">Subscribe</a> -->
                </ul>

                <div class="header-search-div">
                    <form action="#" class="header-search">
                        <input placeholder="{{__('front.Search for online courses')}}" class="header-search-input">
                        <button type="submit" class="header-search-submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-auto pr-lg-0 d-lg-flex d-md-none d-none">

            <a href="{{url('student-signup')}}" class="btn header-btn2 mr-2">{{__('front.SignUp')}}</a>

            <a href="{{url('user-login')}}" class="btn header-btn2 mr-2">{{__('front.Log In')}}</a>
            <!-- <a href="#" class="btn header-btn">Subscribe</a> -->
        </div>
    </div>
</nav>
<!-- end navigation -->