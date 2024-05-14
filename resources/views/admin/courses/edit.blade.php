
@extends('layout.admin_main')
@section('content')	

@toastr_css

  <div class="content-header row">
                    <div class="content-header-left col-md-12 col-12 mb-2 breadcrumb-new">
                      <h3 class="content-header-title mb-0 d-inline-block">إضافة دورة جديد</h3><br>
                        <div class="row breadcrumbs-top d-inline-block">
	                        <div class="breadcrumb-wrapper col-12">
	                       	<ol class="breadcrumb">
		                        <li class="breadcrumb-item"><a href="{{url('instructor/dashboard')}}">الرئيسية</a>	</li>
		            	       	<li class="breadcrumb-item active"> الدورات المباشرة (اونلاين)</li>
	                        </ol> 
                        </div>
                      	</div>
                    </div>
                    @if(session()->has('message'))
	                   @include('admin.includes.alerts.success')
	                @endif
	                @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>خطأ</strong>
  	                        <ul>
                                @foreach ($errors->all() as $error)
                               	    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif    
                   
    </div>


<section id="basic-form-layouts">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="bordered-layout-basic-form"></h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collpase show">
                  <div class="card-body">
                   	
			        <form  method="post"  action="{{route('courses-update')}}" enctype="multipart/form-data">
                        @csrf
                        <!--@method('put')-->
                        <input type="hidden" name="id" value="{{$edit->id}}" >
			            <div class="row form-row">
                            <div class="form-group col-md-6 col-sm-6">
                                <label>عنوان الدورة عربي</label>
                                <input type="text" name="title" class="form-control" value="{{$edit->title}}" id="titleid">
                                @error('title')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                <span id="titleError" style="color: red;"></span>
                            </div>
                            <div class="form-group col-md-6 col-sm-6">
                                <label>عنوان الدورة انجليزي</label>
                                <input type="text" name="title_ar" class="form-control" value="{{$edit->title_ar}}" id="titlearid">
                                @error('title_ar')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                <span id="titlearError" style="color: red;"></span>
                            </div>
                            <div class="form-group col-md-6 col-sm-6">
                                <label>تاريخ بداية الدورة ( يجب أن يكون التاريخ بعد اسبوعين على الاقل من تاريخ اليوم ) </label>
                                <input type="date" name="date" class="form-control" value="{{$edit->date}}" id="dateid">
                                @error('date')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                <span id="dateError" style="color: red;"></span>
                            </div>
                            <div class="form-group col-md-6 col-sm-6">                                    
                                <label> وقت الدورة (توقيت الاردن) </label>
                                <select name="time" class="form-control formselect" id="timeid" >
                                    <!--<option  value=""  selected>اختار</option>  -->
                                    <option value="6.30 - 8.00" {{ $edit->time == "6.30 - 8.00" ? "selected" : "" }}>
                                    6.30 مساء - 8.00 مساء
                                    </option>
                                    <option value="8.00 - 9.30" {{ $edit->time == "8.00 - 9.30" ? "selected" : "" }}>
                                    8.00 مساء - 9.30 مساء 
                                    </option> 
                                    <option value="9.30 - 11:00" {{ $edit->time == "9.30 - 11:00" ? "selected" : "" }}>
                                     09.30 مساء 11.00 مساء 
                                    </option>  
                                </select>
                                <span id="timeError" style="color: red;"></span>
                            </div>
                            <div class="form-group col-md-6 col-sm-6">                                   
                                <label>حدد مدة الدورة بالأيام</label>
                                <select name="duration" class="form-control formselect" id="durationid">
                                    <!--<option  value=""  selected>اختار</option>  -->
                                    <option value="3" {{ $edit->duration == "3" ? "selected" : "" }}>
                                        3 أيام
                                    </option>  
                                    <option value="4" {{ $edit->duration == "4" ? "selected" : "" }}>
                                       4 أيام
                                    </option> 
                                    <option value="5" {{ $edit->duration == "5" ? "selected" : "" }}>
                                       5 أيام
                                    </option>  
                                    <option value="7" {{ $edit->duration == "7" ? "selected" : "" }}>
                                       7 أيام
                                    </option> 
                                    <option value="10" {{ $edit->duration == "10" ? "selected" : "" }}>
                                        "10 أيام"
                                    </option> 
                                </select>
                                <span id="durationError" style="color: red;"></span>
                            </div> 
                            
                            <div class="form-group col-md-6 col-sm-6">                                   
                                <!--<label>حدد الدورة مجاني ام مدفوع</label>-->
                                 <label>بالفترة الحالية نقبل الدورات المجانية فقط مع الربح من الشهادات ولاحقاً سيتم تفعيل الدورات المدفوعة</label>
                                <select name="payed" class="form-control formselect" id="payedId">
			                        <option value="0" {{ $edit->payed == 0 ? "selected" : "" }}>مجاني</option>  
			                        <option value="1" {{ $edit->payed == 1  ? "selected" : "" }}>مدفوع</option>   
			                    </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-6">                                   
                                <label>حدد سعر الدورة</label>
                                <select name="price" class="form-control formselect" id="priceId"  {{ $edit->payed == 0 ? "disabled" : "" }} >
                                    <option value="0"  {{ $edit->price == 0 ? "selected" : "" }}>0</option>  
                                    <option value="3" {{ $edit->price == 3 ? "selected" : "" }}>3</option> 
                                    <option value="5" {{ $edit->price == 5 ? "selected" : "" }}>5</option> 
                                    <option value="10" {{ $edit->price == 10 ? "selected" : "" }}>10</option> 
                                    <option value="20" {{ $edit->price == 20 ? "selected" : "" }}>20</option>  
                                    <option value="30" {{ $edit->price == 30 ? "selected" : "" }}>30</option>
                                    <option value="40" {{ $edit->price == 40 ? "selected" : "" }}>40</option>
                                    <option value="50" {{ $edit->price == 50 ? "selected" : "" }}>50</option>
                                    <option value="60" {{ $edit->price == 60 ? "selected" : "" }}>60</option>
                                    <!--<option value="70" {{ $edit->price == 70 ? "selected" : "" }}>70</option>-->
                                    <!--<option value="80" {{ $edit->price == 80 ? "selected" : "" }}>80</option>-->
                                    <!--<option value="90" {{ $edit->price == 90 ? "selected" : "" }}>90</option>-->
                                </select>
                                <span id="priceError" style="color: red;"></span>
                            </div>
                            <div class="form-group col-md-6 col-sm-6">
                            <label>وصف قصير والهدف من الدورة</label>
                            <textarea name="short_detail"  cols="30" rows="2"  class="form-control" id="short_detailid">{{$edit->short_detail}}</textarea>
                            <!--<input type="text" name="short_detail" class="form-control" value="{{old('short_detail')}}" id="short_detailid">-->
                            @error('short_detail')
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span id="short_detailError" style="color: red;"></span>
                          </div>
                            <div class="form-group col-md-6 col-sm-6">
                            <label>الفئة المستهدفة</label>
                            <textarea name="target_group"  cols="30" rows="2"  class="form-control" id="target_groupid">{{$edit->target_group}}</textarea>
                            <!--<input type="text" name="detailid" class="form-control" value="{{old('detailid')}}" id="detailid">-->
                            @error('target_group')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span id="target_groupError" style="color: red;"></span>
                          </div>
                            <div class="form-group col-md-6 col-sm-6">
                            <label>المحاور </label>
                            <textarea name="mahawir"  cols="30" rows="2"  class="form-control" id="mahawirid">{{$edit->mahawir}}</textarea>
                            <!--<input type="text" name="detail" class="form-control" value="{{old('detail')}}" id="detailid">-->
                            @error('mahawir')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span id="mahawirError" style="color: red;"></span>
                          </div>
                            <div class="form-group col-sm-12 ">
                                <img class="avatar-img" src="{{asset('assets_admin/img/livecourses/'.$edit->image) }}" width="100px" hieght="100px" alt="Speciality">
									       
                                <label>صورة العرض </label>
                                <input type="file" name="image" class="form-control" accept=".JPEG,.JPG,.PNG,.GIF,.TIF,.TIFF" id="imageid">
                                <span id="imageError" style="color: red;"></span>
                            </div>
                            
                            <div class="form-group col-md-6 col-sm-6">
                                <label>الرابط</label>
                                <input type="text" name="meeting_url" class="form-control" value="{{$edit->meeting_url}}" id="meeting_urlid">
                                @error('url')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                <span id="meeting_urlError" style="color: red;"></span>
                            </div>
                            <div class="form-group col-md-6 col-sm-6">
                                <label>كلمة المرور</label>
                                <input type="text" name="meeting_password" class="form-control" value="{{$edit->meeting_password}}" id="meeting_passwordid">
                                @error('meeting_password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                <span id="meeting_passwordError" style="color: red;"></span>
                            </div>
                            
                      </div>
			            <button type="submit" class="btn btn-primary btn-block">حفظ </button>
	                </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
    
 <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
        $(document).ready(function () {
            $('#payedId').on('change', function () {
                
                console.log("welcome sub"); 
                let payedId = $(this).val();
                console.log(payedId); 
                if(payedId ==1){
                    document.getElementById('priceId').disabled = false;
                }else{
                    document.getElementById('priceId').value = "";
                    document.getElementById('priceId').disabled = true;
                }
            });
        });
    </script>
<script> 
        $(document).ready(function () {
            $('#get_sub_category_name').on('change', function () {
                console.log("welcome sub"); 
                let id = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: "{{url('instructor/getSubCategory')}}/"+id,
                    success: function (response) {
                        var response = JSON.parse(response)
                        console.log(response);   
                        $('#get_sub_category').empty();
                        $('#get_sub_category').append(`<option value="0" disabled selected>Select </option>`);
                        response.forEach(element => {
                            $('#get_sub_category').append(`<option value="${element['id']}">
                            ${element['title']} - ${element['id']} 
                            </option>`);
                        });
                    }
                });
            });
        });

        $(document).ready(function () {
            $('#get_sub_category').on('change', function () {
                console.log("welcome sub"); 
                let id = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: "{{url('instructor/getchildcategory')}}/"+id,
                    success: function (response) {
                        var response = JSON.parse(response)
                        console.log(response);   
                        $('#get_child_category').empty();
                        $('#get_child_category').append(`<option value="0" disabled selected>Select </option>`);
                        response.forEach(element => {
                            $('#get_child_category').append(`<option value="${element['id']}">
                            ${element['title']} - ${element['id']} 
                            </option>`);
                        });
                    }
                });
            });
        });

    $('#delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var cat_id = button.data('catid') 
        var modal = $(this)
        modal.find('.modal-body #cat_id').val(cat_id);
    })
</script> 
    @toastr_js
    @toastr_render
@endsection