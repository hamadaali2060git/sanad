@extends('layout.admin_main')
@section('content')
<div id="crypto-stats-3" class="row">
  <div class="col-xl-4 col-12">
    <div class="card crypto-card-3 pull-up">
      <div class="card-content">
        <a href="{{url('admin/courses')}}">
          <div class="card-body pb-0">
            <div class="row">
              <!-- <div class="col-2">
              <a href="{{url('admin/courses')}}">
                <h1
                  style="color: white; border-radius: 30px;padding: 6px 14px 6px 31px;background-color: #FF9149 !important;">
                  B</h1>
              </a>
            </div> -->
              <div class="col-7 pl-2">
                <a href="{{url('admin/courses')}}">
                  <h4>عدد الكورسات</h4>
                  <h6 class="text-muted">عدد الكورسات</h6>
                </a>
              </div>
              <div class="col-3 text-right">
                <a href="{{url('admin/courses')}}">
                  <h5> {{$course_count}}</h5>
                </a>
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
  <div class="col-xl-4 col-12">
    <div class="card crypto-card-3 pull-up">
      <div class="card-content">
        <div class="card-body pb-0">
          <div class="row">
            <!-- <div class="col-2">
              <a href="{{url('admin/lives')}}">
                <h1
                  style="color: white; border-radius: 30px;padding: 6px 14px 6px 31px;background-color: #FF9149 !important;">
                  B</h1>
              </a>
            </div> -->
            <div class="col-7 pl-2">
              <a href="{{url('admin/instructors')}}">
                <h4>عدد المدربين</h4>
                <h6 class="text-muted">عدد المدربين</h6>
              </a>
            </div>
            <div class="col-3 text-right">
              <a href="{{url('admin/instructors')}}">
                <h5> {{$instructor_count}}</h5>
              </a>
            </div>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-12">
            <canvas id="btc-chartjs" class="height-75"></canvas>
          </div>
        </div> -->
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-12">
    <div class="card crypto-card-3 pull-up">
      <div class="card-content">
        <div class="card-body pb-0">
          <div class="row">
            <!-- <div class="col-2">
              <a href="{{url('admin/lives')}}">
                <h1
                  style="color: white; border-radius: 30px;padding: 6px 14px 6px 31px;background-color: #FF9149 !important;">
                  B</h1>
              </a>
            </div> -->
            <div class="col-7 pl-2">
              <a href="{{url('admin/students')}}">
                <h4>عدد الطلاب</h4>
                <h6 class="text-muted">عدد الطلاب</h6>
              </a>
            </div>
            <div class="col-3 text-right">
              <a href="#">
                <h5> {{$student_count}}</h5>
              </a>
            </div>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-12">
            <canvas id="btc-chartjs" class="height-75"></canvas>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</div>
@endsection