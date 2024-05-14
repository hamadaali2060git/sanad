<!-- start footer -->
<footer class="footer-classic-dark bg-white pb-3 pt-3 mt-5">


    <div class="footer-widget-area">
        <div class="container">
            <div class="row">
                <!-- start about -->
                <div class="col-lg-4 col-md-6 widget">
                    <a href="{{url('/')}}" title="" class="logo">
                        <h1>sanad</h1>
                    </a>
                    <p>
                        @if($langg=='ar')
                        {{ Illuminate\Support\Str::words($contact->desc_ar, 10, '...') }}
                        <!-- {{$contact->desc_ar }} -->
                        @else
                        {{ Illuminate\Support\Str::words($contact->desc_en, 12, '...') }}
                        <!-- {{$contact->desc_en}} -->
                        @endif
                    </p>


                </div>
                <!-- end about -->

                <div class="col-lg-5 offset-lg-1 col-md-6 widget">
                    <div class="widget-title">
                        {{__('front.links')}}</div>

                    <div class="row">

                        <div class="col-6">

                            <a href="{{url('about')}}" class="d-block mt-3"> {{__('front.about sanad')}}</a>

                            <a href="{{url('contact')}}" class="d-block mt-3"> {{__('front.contact')}}</a>
                        </div>

                        <div class="col-6">

                            <a href="{{url('instructors')}}" class="d-block mt-3">{{__('front.instructors')}}</a>

                            <a href="{{url('policy')}}" class="d-block mt-3">{{__('front.privacy policy')}}</a>
                        </div>

                    </div>



                </div>


                <div class="col-lg-2 col-md-6 widget mt-5">


                    <!-- Default dropup button -->
                    <div class="btn-group dropup">
                        <button type="button" class="btn header-btn dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            {{__('front.language')}}
                        </button>
                        <div class="dropdown-menu p-2">
                            <!-- Dropdown menu links -->

                            <p> <a href="{{url('lang/ar')}}" class="text-dark">{{__('front.arabic')}}</a></p>
                            <p><a href="{{url('lang/en')}}" class="text-dark">{{__('front.english')}}</a></p>


                        </div>
                    </div>

                </div>
            </div>
            <div class="container" style="text-align: center;padding-top: 15px;">
                <p>Copyright © 2024 by sanad.com All right reserved</p>
            </div>
        </div>
    </div>

</footer>
<!-- end footer -->

<!-- start scroll to top -->
<a class="scroll-top-arrow" href="javascript:void(0);"><i class="fas fa-arrow-up"></i></a>
<!-- end scroll to top  -->

<!-- javascript libraries -->

<script type="text/javascript" src="{{asset('front/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('front/js/bootstrap.bundle.js')}}"></script>

<!-- menu navigation -->
<script type="text/javascript" src="{{asset('front/js/bootsnav.js')}}"></script>
<script type="text/javascript" src="{{asset('front/js/jquery.nav.js')}}"></script>

<!-- magnific-popup -->
<script src="{{asset('front/js/jquery.magnific-popup.min.js')}}"></script>

<!-- swiper carousel -->
<script type="text/javascript" src="{{asset('front/js/swiper.min.js')}}"></script>

<!-- main slider -->
<script src="{{asset('front/js/slider.js')}}"></script>


<!-- Data table -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">



<!-- setting -->
<script type="text/javascript" src="{{asset('front/js/main.js')}}"></script>