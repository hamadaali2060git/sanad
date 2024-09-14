@extends('layout.admin_main')
@section('content')	
		<div class="content-header row">
			        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
			          <h3 class="content-header-title mb-0 d-inline-block">الدورات التفاعليه </h3><br>
			          <div class="row breadcrumbs-top d-inline-block">
			            <div class="breadcrumb-wrapper col-12">
			              <ol class="breadcrumb">
			                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">الرئيسية</a>
			                </li>  
			                
			                <li class="breadcrumb-item active">الدورات التفاعلية
			                </li>
			              </ol> 
			            </div>
			          </div>
			        </div>
			        <div class="content-header-right col-md-6 col-12">
			          <!-- <div class="dropdown float-md-right">
			               <a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">أضافة مدرب </a>
			          </div> -->
			        </div>
			        
			         
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
		<section id="keytable">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"></h4>
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
            
            <div class="card-content collapse show">
              <div class="card-body card-dashboard">
                <!-- <div class="row">
                  <div class="col-md-10">
                    <form action="{{url('admin/live-course-filter')}}" method="get">
                      @csrf
                      <div class="row form-row">
                        <div class="col-md-5">
                          <div class="form-group">
                            <label>بحث عن كورس </label>
                            <select name="filter" class="form-control select2-diacritics "  placeholder="بحث">
                                <option  value="0">بانتظار الموافقة</option>
                                <option  value="1">مقبولة</option>
                                <option  value="2"> بحاجة إلى تغيير الوقت</option>
                                <option  value="3">بحاجة الى تأجيل الموعد </option>
                                <option  value="4">يرجى التواصل معنا</option>
                                <option  value="5">أنتهت</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-3" style="margin-top: 5px">
                          <label> </label>
                          <button type="submit" class="btn btn-primary btn-block"> بحث  </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div><br> -->
            
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered keytable-integration">
                      <thead>
                        <tr>    
                          <th>الصورة</th>
                          <th>العنوان </th>
                          <th>اسم المدرب</th>
                          <th>الحالة</th>
                            <th class="text-center">العمليات</th>
                        </tr>
                      </thead>
                      <tbody>                     
                        @foreach ($courses as $key=>$_item)
                          <tr>
                            <td>
                                <a href="profile" class="avatar avatar-sm mr-2">
                                <img class="avatar-img" src="{{asset('img/courses/'.$_item->image) }}" alt="Speciality">
                                </a>
                            </td>
                            <td>{{ $_item->title }}</td>    
                            <td>
                              <a href="{{url('admin/instructor-profile/'.$_item->course_instructor->id) }}">{{ $_item->course_instructor->name }}</a>
                            </td> 
                            <td>
                              <a data-toggle="modal" data-catid="{{ $_item->id }}" data-target="#status{{$key}}" class="delete-course">
                                <button type="button" class=" btn btn-outline-warning">
                                  @if($_item->status==0)
                                        بانتظار الموافقة
                                    @elseif($_item->status==1)  
                                        مقبولة
                                    @elseif($_item->status==2)  
                                      بحاجة إلى  تغيير الوقت
                                    @elseif($_item->status==3)
                                        بحاجة الى تأجيل الموعد 
                                    @elseif($_item->status==4)
                                        يرجى التواصل معنا
                                    @else
                                      انتهت
                                    @endif
                                </button>
                              </a>
                            </td>
                            <td class="text-right">
                                  <a href="{{url('admin/course-joined/'.$_item->id)}}"  class="edit-course">
                                      <button type="button" class="btn btn-outline-success "><i class="la la-users"></i></button>
                                      <span class="editcourse">المسجلين ف الدورة</span>
                                  </a>
                                  <a href="{{url('admin/courses/edit/'.$_item->id)}}"  class="edit-course">
                                      <button type="button" class="btn btn-outline-success "><i class="la la-edit"></i></button>
                                      <span class="editcourse">تعديل الدورة</span>
                                  </a>
                                  <a  data-toggle="modal" data-catid="{{ $_item->id }}" data-target="#delete" class="delete-course">
                                      <button type="button" class=" btn btn-outline-warning"><i class="la la-trash-o"></i></button>
                                    <span class="deletecourse"> حذف</span>
                                  </a>
                            </td>
                          </tr>
                          <div class="modal fade" id="status{{$key}}" aria-hidden="true" role="dialog">
                                    <div class="modal-dialog modal-dialog-centered" role="document" >
                                        <div class="modal-content">                                
                                            <div class="modal-body">
                                                <div class="form-content p-2">
                                                    <h4 class="modal-title"> تغيير حالة الكورس </h4>
                                                  
                                                    <div class="row text-center">
                                                    <div class="col-sm-3">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <form method="post" action="{{route('courses-update-status')}}">
                                                                @csrf
                                                                <input type="hidden" name="id" value="{{ $_item->id }}">
                                                                <div class="col-md-12">
                                                                  <div class="card">
                                                                    <div class="card-content">
                                                                      <div class="card-body" style="text-align: right;">
                                                                        <fieldset>
                                                                          <div class="float-left">
                                                                            <input type="radio" name="status" class="switchBootstrap" value="1" {{ $_item->status == 1 ? 'checked' : '' }}>
                                                                            <label>مقبولة</label>
                                                                            <br>
                                                                            <input type="radio" name="status" class="switchBootstrap" value="0" {{ $_item->status == 0 ? 'checked' : '' }}>
                                                                            <label>بانتظار الموافقة</label>
                                                                            <br>
                                                                            <input type="radio" name="status" class="switchBootstrap" value="2" {{ $_item->status == 2 ? 'checked' : '' }}>
                                                                            <label>بحاجة إلى تغيير الوقت</label>
                                                                            <br>
                                                                            <input type="radio" name="status" class="switchBootstrap" value="3" {{ $_item->status == 3 ? 'checked' : '' }}>
                                                                            <label> بحاجة الى تأجيل الموعد </label>
                                                                            <br>
                                                                            <input type="radio" name="status" class="switchBootstrap" value="4" {{ $_item->status == 4 ? 'checked' : '' }}>
                                                                            <label>يرجى التواصل معنا</label>
                                                                            <br>
                                                                            <input type="radio" name="status" class="switchBootstrap" value="5" {{ $_item->status == 5 ? 'checked' : '' }}>
                                                                            <label>أنتهت</label>
                                                                            <br>
                                                                          </div>
                                                                        </fieldset>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                                
                                                                <button type="submit" class="btn btn-primary">حفظ التغيير </button>
                                                            </form>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>  
                        @endforeach
                      </tbody>
                    </table>
                  </div>			
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


            

			<!-- Add Modal -->
			<!-- <div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">أضافة دولة</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="" method="POST" 
                                name="le_form"  enctype="multipart/form-data">
                                @csrf
								<div class="row form-row">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الدولة عربي</label>
											<input type="text" name="name_ar" class="form-control" value="{{old('name_ar')}}">
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الدولة انجليزي</label>
											<input type="text" name="name_en" class="form-control" value="{{old('name_en')}}">
										</div>
									</div>
									
									
								</div>
								<button type="submit" class="btn btn-primary btn-block">أضافة دولة </button>
							</form>
						</div>
					</div>
				</div>
			</div> -->
			<!-- /ADD Modal -->
			
			<!-- Edit Details Modal -->
			<!-- <div class="modal fade" id="edit" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">تعديل الدولة</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

							 <form  method="post" action="" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                               
								<div class="row form-row">
									<input type="hidden" name="id" id="cat_id" >
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الدولة عربي </label>
											<input type="text" name="name_ar" class="form-control" id="namear" >
											
										</div>
									</div>
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<label>الدولة انجليزي</label>
											<input type="text" name="name_en" class="form-control" id="nameen" >
										</div>
									</div>
									
									
								</div>
								<button type="submit" class="btn btn-primary btn-block">حفظ التغيير</button>
							</form>



						</div>
					</div>
				</div>
			</div> -->
			<!-- /Edit Details Modal -->
			
			<!-- Delete Modal -->
			<div class="modal fade" id="delete" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
					<!--	<div class="modal-header">
							<h5 class="modal-title">Delete</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>-->
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">حذف</h4>
								<p class="mb-4">هل انت متأكد من حذف هذا العنصر ؟</p>
								<div class="row text-center">
									<div class="col-sm-3">
									</div>
									<div class="col-sm-2">
										<form method="post" action="{{route('courses-delete')}}">
	                                   		 @csrf
	                                         <!--@method('delete')-->
	                                         <input type="hidden" name="id" id="cat_id" >
	                                    	<button type="submit" class="btn btn-primary">حذف </button>
	                                    </form>
									</div>
									<div class="col-sm-2">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Delete Modal -->
        </section>


<!-- <script src="{{asset('js/app.js')}}"></script> -->

<script>
    $('#edit').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) 
      var name_ar = button.data('name_ar') 
      var name_en = button.data('name_en') 
      var cat_id = button.data('catid') 
      var modal = $(this)

      modal.find('.modal-body #namear').val(name_ar);
      modal.find('.modal-body #nameen').val(name_en);
      modal.find('.modal-body #cat_id').val(cat_id);
    })


	 $('#delete').on('show.bs.modal', function (event) {

      var button = $(event.relatedTarget) 

      var cat_id = button.data('catid') 
      var modal = $(this)

      modal.find('.modal-body #cat_id').val(cat_id);
})


</script>

<style>
    .add-video {
      position: relative;
      display: inline-block;
    }

    .add-video .addvideo {
      visibility: hidden;
      width: 76px;
      font-size: 10px;
      background-color: black;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px 0;
      
      position: absolute;
      z-index: 1;
      bottom: 100%;
      left: 50%;
      margin-left: -35px;
    }

    .add-video:hover .addvideo {
      visibility: visible;
    }
    /*//////////////*/

    .all-video {
      position: relative;
      display: inline-block;
    }

    .all-video .allvideo {
      visibility: hidden;
      width: 75px;
      font-size: 10px;
      background-color: black;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px 0;
      
      position: absolute;
      z-index: 1;
      bottom: 100%;
      left: 50%;
      margin-left: -35px;
    }

    .all-video:hover .allvideo {
      visibility: visible;
    }

    /*//////////////*/

    .edit-course {
      position: relative;
      display: inline-block;
    }

    .edit-course .editcourse {
      visibility: hidden;
      width: 75px;
      font-size: 10px;
      background-color: black;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px 0;
      
      position: absolute;
      z-index: 1;
      bottom: 100%;
      left: 50%;
      margin-left: -35px;
    }

    .edit-course:hover .editcourse {
      visibility: visible;
    }

    /*//////////////*/

    .delete-course {
      position: relative;
      display: inline-block;
    }

    .delete-course .deletecourse {
      visibility: hidden;
      width: 75px;
      font-size: 10px;
      background-color: black;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px 0;
      
      position: absolute;
      z-index: 1;
      bottom: 100%;
      left: 50%;
      margin-left: -35px;
    }

    .delete-course:hover .deletecourse {
      visibility: visible;
    }
</style>
@endsection
