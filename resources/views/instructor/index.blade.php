
@extends('layout.instructor.main')
@section('content')     
<div id="crypto-stats-3" class="row">
        <!-- <div class="col-xl-12 col-12">
            <div class="card crypto-card-3 pull-up" style="padding-top: 43px;padding-right: 20px;padding-bottom: 35px;">
              <div class="card-content">
                <h5 style="">
                        عزيزي المدرب :   يجب عليك أن تقرأ ( ارشادات المدرب ) و أن تشاهد (فيديوهات ارشادية) قبل أن تبدأ العمل معنا وتنشر دوراتك الموجودات على اليمين من هذه الشاشة في الاسفل      
                </h6>
              </div>
            </div>
        </div> -->

        <!-- <div class="col-xl-4 col-12">
            <div class="card crypto-card-3 pull-up">
              <div class="card-content">
                <a href="{{url('instructor/courses')}}">
                <div class="card-body pb-0">
                  <div class="row">
                    <div class="col-2">
                      <h1><i class="ft-video"></i></h1>
                    </div>
                    <div class="col-5 pl-2">
                      <h4><i class="ft-video"></i></h4>
                      <h6 class="text-muted">الدورات المسجلة</h6>
                    </div>
                    <div class="col-5 text-right">
                      <h4>4545</h4>
                      <h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6>
                    </div>
                  </div>
                </div>
                </a>
                <div class="row">
                  <div class="col-12">
                    <canvas id="btc-chartjs" class="height-75"></canvas>
                  </div>
                </div>
              </div>
            </div>
        </div> -->

        <div class="col-xl-4 col-12">
            <div class="card crypto-card-3 pull-up">
              <div class="card-content">
                <a href="{{ url('instructor/straights') }}">
                <!--<a href="#">    -->
                    <div class="card-body pb-0">
                      <div class="row">
                        <div class="col-2">
    
                          <h1><i class="cc BTC warning font-large-2" title="c"></i></h1>
                        </div>
                        <div class="col-8 pl-2">
                          <!--<h4>B</h4>-->
                         
                          <h6 class="text-muted"> الدورات الاونلاين</h6>
                          <h4>{{$courses}}</h4>
                          <!--<h6 class="text-muted">حاليا الخدمة متوقفة وسوف يتم تفعيلها لاحقا</h6>-->
                        </div>
                        <div class="col-2 text-right">
                          <h4>{{$courses}}</h4>
                          <!-- <h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6> -->
                        </div>
                      </div>
                    </div>
                </a>
                <!-- <div class="row">
                  <div class="col-12">
                    <canvas id="btc-chartjs" class="height-75"></canvas>
                  </div>
                </div> -->
              </div>
            </div>
        </div>
        <!-- <div class="col-xl-4 col-12">
            <div class="card crypto-card-3 pull-up">
              <div class="card-content">
                <a href="">
                <div class="card-body pb-0">
                  <div class="row">
                    <div class="col-2">
                      <h1><i class="la la-dollar font-large-2" title="BTC"></i></h1>
                    </div>
                    <div class="col-5 pl-2">
                      <h4>$</h4>
                      <h6 class="text-muted">رصيد المحفظة</h6>
                    </div>
                    <div class="col-5 text-right">
                      <h4>45</h4>
                      
                    </div>
                  </div>
                </div>
                </a>
                
              </div>
            </div>
        </div> -->
</div>
        
   
@endsection
    