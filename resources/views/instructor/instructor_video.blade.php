
@extends('layout.instructor.main')
@section('content')	

 
    <div class="content-header row">
                    <div class="content-header-left col-md-12 col-12 mb-2 breadcrumb-new">
                      <h3 class="content-header-title mb-0 d-inline-block">الفيديوهات</h3><br>
                      <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('instructor/dashboard')}}">الرئيسية</a>
                            </li>                            
                            <li class="breadcrumb-item active">الفيديوهات
                            </li>
                          </ol> 
                        </div>
                      </div>
                    </div>
                    <!-- <div class="content-header-right col-md-6 col-12">
                      <div class="dropdown float-md-right">
                           <a href="{{route('videos.create')}}"  class="btn btn-primary float-right mt-2">أضافة فيديو جديد</a>
                      </div>
                    </div> -->
                     
                    @if(session()->has('message'))
                        @include('admin.includes.alerts.success')
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
    </div>
    
    
    
    <section id="drag-area">
          
          <div class="row" id="card-drag-area">
             @foreach ($videos as $key =>$_item)
            <div class="col-md-3 col-sm-12">
              <div class="card">
                <div class="card-content collapse show">
                    
                    <!--<iframe src="https://youtu.be/kduLvsb1zpg" width="860" height="550" frameborder="0" allowfullscreen></iframe>-->
                    <video controls width="216" height="150">
                     <source src="{{asset('img/courses/video/'.$_item->video) }}" type="video/mp4">
                     <source src="{{asset('img/courses/video/'.$_item->video) }}" type="video/ogg">
                     Your browser does not support the video tag.
                    </video>
                </div>
                <div class="card-header">
                  <h4 class="card-title">{{$_item->title_ar}}</h4>
                </div>
              </div>
            </div>
             @endforeach
          </div>
        </section>


@endsection