@extends('layout.admin_main')
@section('content')	
<script>
function separateString() {
    mahawirArId = document.getElementById("mahawir_arid");
    mahawir_ar_array = mahawirArId.value.split(',');     
    // console.log(mahawirArray[0]);
    for (let i = 0; i < mahawir_ar_array.length; i++) {
        console.log(mahawir_ar_array[i]);
        $('#add_mahawir_ar').append(`
            <input type="hidden" name="mahawir_ar_name[]" class="videovalue" value="${mahawir_ar_array[i]}" >
        `); 
    }

    mahawirEnId = document.getElementById("mahawir_enid");
    mahawir_en_array = mahawirEnId.value.split(',');     
    console.log(mahawir_en_array[0]);
    for (let i = 0; i < mahawir_en_array.length; i++) {
      console.log(mahawir_en_array[i]);
        $('#add_mahawir_en').append(`
            <input type="hidden" name="mahawir_en_name[]" class="videovalue" value="${mahawir_en_array[i]}" >
        `); 
    }

    requirementArId = document.getElementById("requirement_arid");
    requirement_ar_array = requirementArId.value.split(',');     
    console.log(requirement_ar_array[0]);
    for (let i = 0; i < requirement_ar_array.length; i++) {
      console.log(requirement_ar_array[i]);
        $('#add_requirement_ar').append(`
            <input type="hidden" name="requirement_ar_name[]"  value="${requirement_ar_array[i]}" >
        `); 
    }


    mahawirEnId = document.getElementById("requirement_enid");
    mahawir_en_array = mahawirEnId.value.split(',');     
    console.log(mahawir_en_array[0]);
    for (let i = 0; i < mahawir_en_array.length; i++) {
      console.log(mahawir_en_array[i]);
        $('#add_requirement_en').append(`
            <input type="hidden" name="requirement_en_name[]"  value="${mahawir_en_array[i]}" >
        `); 
    }


    
    // return false;

}
 
</script>  

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
                          <div class="form-group col-md-6 col-sm-12">
                            <label>عنوان الدورة عربي</label>
                            <input type="text" name="title_ar" class="form-control" value="{{$edit->title_ar}}" id="titleid">
                            @error('title_ar')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span id="titleArError" style="color: red;"></span>
                          </div>
                          <div class="form-group col-md-6 col-sm-12">
                            <label>عنوان الدورة انجليزي</label>
                            <input type="text" name="title_en" class="form-control" value="{{$edit->title_en}}" id="titleid">
                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span id="titleEnError" style="color: red;"></span>
                          </div>
                          <div class="form-group col-md-6 col-sm-6">
                              <label> التخصص </label>
                              <select class="form-control select" name="category_id">
                                  <!-- <option>اختر التخصص</option> -->
                                  @foreach ($categories as $_item)
                                  <option value="{{$_item->id}}" {{ $edit->id == $_item->id ? "selected" : "" }}>{{$_item->title_ar}}</option>
                                      <!-- <option value="{{$_item->id}}" >{{$_item->title_ar}}</option> -->
                                  @endforeach
                              </select>
                          </div>
                          <div class="form-group col-md-6 col-sm-12">
                            <label>لغة الدورة</label>
                            <input type="text" name="language" class="form-control" value="{{$edit->language}}" id="titleid">
                            @error('language')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span id="languageError" style="color: red;"></span>
                          </div>
                          <div class="form-group col-md-4 col-sm-6">
                            <label>تاريخ بداية الدورة  </label>
                              <input type="date" name="date" class="form-control"  value="{{$edit->date}}" id="dateid">
                              @error('date')
                                <span class="text-danger">{{$message}}</span>
                              @enderror
                              <span id="dateError" style="color: red;"></span>
                          </div>
                          <div class="form-group col-md-4 col-sm-6">                                   
                            <label> وقت الدورة (توقيت الاردن) </label>
                            <select name="time" class="form-control formselect" id="timeid" >
                                <!-- <option  value=""  selected>اختار</option>   -->
                                <option value="6.30 - 8.00" {{ $edit->time == "6.30 - 8.00" ? "selected" : "" }}>
                                06.30 مساء - 08.00 مساء
                                </option>
                                <option value="8.00 - 9.30" {{ $edit->time == "8.00 - 9.30" ? "selected" : "" }}>
                                08.00 مساء 09.30 مساء 
                                </option>  
                                <option value="9.30 - 11:00" {{ $edit->time == "9.30 - 11:00" ? "selected" : "" }}>
                                  09.30 مساء 11.00 مساء 
                                </option> 
                            </select>
                            <span id="timeError" style="color: red;"></span>
                          </div>
                          <div class="form-group col-md-4 col-sm-6">                                   
                            <label>حدد مدة الدورة بالايام</label>
                            <select name="duration" class="form-control formselect" id="durationid">
                              <!-- <option  value=""  selected>اختار</option>   -->
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
                                <label>حدد الدورة مجاني ام مدفوع</label>
                                <select name="payed" class="form-control formselect" id="payedId" disabled>
                                  <option value="0" {{ $edit->payed == 0 ? "selected" : "" }}>مجاني</option>  
                                  <option value="1" {{ $edit->payed == 1  ? "selected" : "" }}>مدفوع</option>   
                              </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-6">                                   
                                <label>حدد سعر الدورة</label>
                                <select name="price" class="form-control formselect" id="priceId" disabled>
                                  <option value="0"  {{ $edit->price == 0 ? "selected" : "" }}>0</option>
                                    <option value="3" {{ $edit->price == 3 ? "selected" : "" }}>3</option>
                                    <option value="5" {{ $edit->price == 5 ? "selected" : "" }}>5</option>
                                    <option value="10" {{ $edit->price == 10 ? "selected" : "" }}>10</option>
                                    <option value="20" {{ $edit->price == 20 ? "selected" : "" }}>20</option>  
                                    <option value="30" {{ $edit->price == 30 ? "selected" : "" }}>30</option>
                                    <option value="40" {{ $edit->price == 40 ? "selected" : "" }}>40</option>
                                    <option value="50" {{ $edit->price == 50 ? "selected" : "" }}>50</option>
                                    <option value="60" {{ $edit->price == 60 ? "selected" : "" }}>60</option>
                                    <option value="70" {{ $edit->price == 70 ? "selected" : "" }}>70</option>
                                    <option value="80" {{ $edit->price == 80 ? "selected" : "" }}>80</option>
                                    <option value="90" {{ $edit->price == 90 ? "selected" : "" }}>90</option>
                                </select>
                                <span id="priceError" style="color: red;"></span>
                            </div>
                          <div class="form-group col-md-6 col-sm-6">
                            <label> شرح توضيحي عن الدورة عربي</label>
                            <textarea name="description_ar"  cols="30" rows="2"  class="form-control" id="short_detailid">{{$edit->description_ar}}</textarea>
                            @error('description_ar')
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span id="descriptionArError" style="color: red;"></span>
                          </div>
                          <div class="form-group col-md-6 col-sm-6">
                            <label>شرح توضيحي عن الدورة انجليزي</label>
                            <textarea name="description_en"  cols="30" rows="2"  class="form-control" id="short_detailid">{{$edit->description_en}}</textarea>
                            @error('description_en')
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span id="descriptionEnError" style="color: red;"></span>
                          </div>
                          
                          
                          <div class="form-group col-md-6">
                            <label> محاور الدورة عربي</label>
                            <input name="mahawir_ar" type="text" class="input-selectize" id="mahawir_arid" value="الحافز,التدرب,الوعي الذاتي,التطور الذاتي" multiple>
                            <div id="add_mahawir_ar"></div>
                            <!-- <input name="mahawir_ar[]" type="text" class="input-selectize" id="mahawir_arid" value="الحافز,التدرب,الوعي الذاتي,التطور الذاتي" multiple> -->
                            @error('mahawir_ar')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span id="mahawirError" style="color: red;"></span>
                          </div>
                          <div class="form-group col-md-6">
                            <label> محاور الدورة انجليزي</label>
                            <input name="mahawir_en" type="text" class="input-selectize" id="mahawir_enid" value="Motivation, training, self-awareness, self-development" multiple>
                            <div id="add_mahawir_en"></div>
                            <!-- <input name="mahawir_en[]" type="text" class="input-selectize" id="mahawir_enid" value="الحافز,التدرب,الوعي الذاتي,التطور الذاتي" multiple> -->
                            @error('mahmahawir_enawir')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span id="mahawirError" style="color: red;"></span>
                          </div>
                          <div class="form-group col-md-6">
                            <label>متطلبات الدورة عربي</label>
                            <input name="course_requirement_ar[]" type="text" class="input-selectize" id="requirement_arid" value="هتمامك بموضوع الدورة ,ورغبتك في التعلم.">
                            <div id="add_requirement_ar"></div>
                            <!-- <input name="course_requirement_ar[]" type="text" class="input-selectize" id="requirement_arid" value="هتمامك بموضوع الدورة ,ورغبتك في التعلم."> -->
                            @error('course_requirement_ar')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span id="ccourseRequirementArError" style="color: red;"></span>
                          </div>
                          <div class="form-group col-md-6">
                            <label>متطلبات الدورة انجليزي</label>
                            <input name="course_requirement_en[]" type="text" class="input-selectize" id="requirement_enid" value="Your interest in the course topic, and your desire to learn.">
                            <div id="add_requirement_en"></div>
                            <!-- <input name="course_requirement_en[]" type="text" class="input-selectize" id="requirement_enid" value="هتمامك بموضوع الدورة ,ورغبتك في التعلم."> -->
                            @error('course_requirement_en')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                            <span id="ccourseRequirementEnError" style="color: red;"></span>
                          </div>
                            
                          <div class="form-group col-sm-6 ">
                              <img class="avatar-img" src="{{asset('img/courses/'.$edit->image) }}" width="100px">
                              <label>صورة تعريفية عن الدورة </label>
                              <input type="file" name="image" class="form-control" accept=".JPEG,.JPG,.PNG,.GIF,.TIF,.TIFF" id="imageid">
                              <span id="imageError" style="color: red;"></span>
                          </div>
                          <!-- <div class="form-group col-sm-6 ">
                            <label> فيديو تعريفي عن الدورة </label>
                            <input type="file" name="video" class="form-control" accept=".JPEG,.JPG,.PNG,.GIF,.TIF,.TIFF" id="videoid">
                            <span id="videoError" style="color: red;"></span>
                          </div> -->
                          
                            <div class="col-md-6 ">
                                <div class=" col-md-12">
                                    <div class="form-group">
                                        <label>ارفق الفيديو</label>
                                        <input type="file" name="file" id="video1"
                                        onchange="saveVideo(video1,'1','videopath1','progress-bar1','hidden1','videovalue1')"
                                        class="form-control fileId" accept=".MP4,.FLV,.ogg,.webm,.mov">
                                        <span id="fileError" style="color: red;"></span>
                                    </div>
                                </div>
                                @if($edit->video)
                                    <div class="col-md-12 hiddenold" >
                                        <video controls="controls" width="200">
                                            <source src="{{asset('img/courses/video/'.$edit->video) }}" type="video/mp4">
                                        </video>
                                    </div>
                                @endif
                                <div class="col-md-12 hidden1" id="hidden1">
                                    <video controls="controls" id="videopath1" width="200">
                                        <source src="" type="video/mp4">
                                    </video>
                                    <input type="hidden" name="video" class="videovalue" id="videovalue1">
                                </div>
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="progress prog1">
                                        <div
                                            class="progress-bar progress-bar1 prog-bar1 progress-bar-striped progress-bar-animated bg-danger"
                                            role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                        </div>
                                        </div>
                                    </div>
                                </div>
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
    $('.loader-container').hide();
    $('.hidden1').hide();
  
    function saveVideo(video, id, videopath, progres, hiddenclassss, videovalue) {
        $(function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-Token': '{{csrf_token()}}' }
        });

        var photo = $(video)[0].files[0];
        var formData = new FormData();
        formData.append('file', photo);
        formData.append('id', id);
        $.ajax({
            // start for progress par
            xhr: function () {
            var xhr = new window.XMLHttpRequest();

            xhr.upload.addEventListener("progress", function (evt) {
                if (evt.lengthComputable) {
                var percentComplete = evt.loaded / evt.total;
                percentComplete = parseInt(percentComplete * 100);

                $('.' + progres).width(percentComplete + '%');
                $('.' + progres).html(percentComplete + '%');

                }
            }, false);

            return xhr;
            },
            // end for progress par

            url: "{{route('savevideo')}}",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
            console.log(data + '>>>>>>>>>>>>>>>>>>>>><<<<' + hiddenclassss);
            //  var div = document.getElementById(hiddenclassss);
            // div.classList.remove(hiddenclassss);
            
            if(data){
                $('.hiddenold').hide();
                $('.' + hiddenclassss).show();
                $('#' + videopath).attr('src', "http://127.0.0.1:8000/img/courses/video/" + data);
                document.getElementById(videovalue).value = data;
            }
            
            
            // document.getElementById(video).value = 'video.png';
            // $('#'+videovalue).append('eeeeeee');
            }
        })
        })
    }

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
@endsection