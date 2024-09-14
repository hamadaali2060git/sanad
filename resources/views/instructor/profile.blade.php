


@extends('layout.instructor.main')
@section('content')	



  <script src="{{asset('admin/vendors/js/editors/ckeditor/ckeditor.js')}}" type="text/javascript"></script>
  <script src="  {{asset('admin/js/scripts/editors/editor-ckeditor.js')}}" type="text/javascript"></script>

		<div class="content-header row">
			        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
			          <h3 class="content-header-title mb-0 d-inline-block"> تعديل الملف الشخصي </h3><br>
			          <div class="row breadcrumbs-top d-inline-block">
			            <div class="breadcrumb-wrapper col-12">
			              <ol class="breadcrumb">
			                <li class="breadcrumb-item"><a href="{{url('instructor/dashboard')}}">الرئيسية</a></li>
			                </li>
			                
			                <li class="breadcrumb-item active">الملف الشخصي
			                </li>
			              </ol> 
			            </div>
			          </div>
			        </div>
			        <div class="content-header-right col-md-6 col-12">

			        </div>
			        
			        @if (session('message'))
			            <div class="alert alert-success">
			                {{ session('message') }}
			            </div>
			        @endif
					@if (session('errorss'))
			        	<div class="alert alert-danger">
			            	<ul>                
			            		{{ session('errorss') }}
			                </ul>
			            </div>
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
               
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <div class="card-body">
						<div class="row">
						<div class="col-md-12">
							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<a href="#">
											<img class="rounded-circle" alt="User Image" src="{{asset('img/profiles/instructors/'.$user->photo) }}" width="100px" height="100px">
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0">{{$user->name}}</h4>
										<h6 class="text-muted">{{$user->email}}</h6>
										<div class="user-Location"><i class="fa fa-map-marker"></i> {{$user->address}}</div>
										<!-- <div class="about-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div> -->
									</div>
									<!-- <div class="col-auto profile-btn">
										
										<a href="" class="btn btn-primary">
											Edit
										</a>
									</div> -->
								</div>
							</div>
							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#per_details_tab">من أنا</a>
									</li>
									<!-- <li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#documents_tab">المستندات</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#certificates_tab">الشهادات </a>
									</li> -->
									<!-- @if(count($course) >= 3)
									    <li class="nav-item">
    										<a class="nav-link" data-toggle="tab" href="#certificates_experience_tab">شهادة الخبره </a>
    									</li>
									@endif -->
    								
									
									<!-- <li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#cv_tab">السيرة الذاتية</a>
									</li> -->
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#password_tab">كلمة المرور</a>
									</li>
									
									<!-- <li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#remove_acount_tab">إلغاء الحساب </a>
									</li> -->

								</ul>
							</div>	
							<div class="tab-content profile-tab-cont">
								
								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>البيانات الشخصية	</span> 
														<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit mr-1"></i>تعديل</a>
													</h5>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">الاسم</p>
														<p class="col-sm-10">{{$user->name}}</p>
													</div>
													
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">البريد الالكتروني</p>
														<p class="col-sm-10">{{$user->email}}</p>
													</div>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">الهاتف</p>
														<p class="col-sm-10" dir="ltr">{{$user->mobile}}</p>
													</div>
													<!-- <div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">الدولة</p>
														<p class="col-sm-10" dir="ltr">{{$user->country}}</p>
													</div> -->
												    <div class="row">
                                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">الجنسية</p>
                                                        <p class="col-sm-10" dir="ltr">{{$user->nationality}}</p>
                                                    </div>
													<div class="row">
                                                        <p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">وصف طويل ومعلومات عن المدرب</p>
                                                        <p class="col-sm-10" dir="ltr">{!! $user->detail !!}</p>
                                                    </div>
													
												</div>
											</div>
											
											<!-- Edit Details Modal -->
											<div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
												<div class="modal-dialog modal-dialog-centered" role="document" >
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">البيانات الشخصية</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
														<form action="{{url('instructor/profile/update')}}" method="POST" 
								                                name="le_form"  enctype="multipart/form-data">
								                            @csrf
															<div class="row form-row">    
																<input type="hidden" name="id" value="{{Auth::guard('instructors')->user()->id}}">
																<div class="col-12 col-sm-12">
																	<div class="form-group">
																		<label> الاسم</label>
																		<input type="text" name="name" class="form-control" value="{{$user->name}}" >
																	</div>
																</div>
																<div class="col-12 col-sm-12">
																
																</div>

																<!-- <div class="form-group">
																	<label for="state"> المدينة </label>
																	<select name="cityId" id="get_city" class="form-control" >
																	</select>
																</div> -->
																	
																	<div class="col-12 col-sm-12">
																		<div class="form-group">
																			<label>الهاتف</label>
																			<input type="text" name="mobile" value="{{$user->mobile}}" class="form-control">
																		</div>
																	</div>
																	
																	<div class="col-12 col-sm-12">
																		<div class="form-group">
																		    <img class="rounded-circle" alt="User Image" src="{{asset('img/profiles/'.$user->photo) }}" width="100px" height="100px">
																			<label>الصورة الشخصية</label>
																			<input type="hidden" name="url" value="{{$user->photo}}" >
																			<input type="file" name="photo" class="form-control" value="Miami" accept=".JPEG,.JPG,.PNG,.GIF,.TIF,.TIFF">
																		</div>
																	</div>nationality
																	
																	<div class="col-12 col-sm-12">
	                                                                    <div class="form-group ">
	                                                                        <label for="projectinput9">وصف طويل ومعلومات عن المدرب</label>
	                                                                        <textarea name="detail" id="ckeditor" cols="30" rows="4"  class="form-control ckeditor" >{{$user->detail}}</textarea>
	                                                                    </div>
	                                                                </div>
																	
																</div>
																<button type="submit" class="btn btn-primary btn-block">حفظ التغيير </button>
															</form>
														</div>
													</div>
												</div>
											</div>
											<!-- /Edit Details Modal -->
											
										</div>
									</div>
									<!-- /Personal Details -->
								</div>
								<!-- /Personal Details Tab --> 

								<!-- Personal Details Tab -->
								<div class="tab-pane fade" id="documents_tab">
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>المستندات	</span> 
														<a class="edit-link btn btn-primary " data-toggle="modal" href="#edit_documents"><i class="fa fa-edit mr-1"></i>جواز السفر / الهوية الشخصية </a>
													</h5>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3">جواز السفر</p>
														<div class="col-auto profile-image">
															<!--<a href="#">-->
															<!--	<img class="rounded-circle" alt="User Image" src="{{asset('img/profiles/documents/'.$user->passport) }}" width="100px" height="100px">-->
															<!--</a>-->
															
															
                                                        <a class="btn btn-primary " style="padding-right: 30px;padding-left: 30px;" href="{{asset('img/profiles/documents/'.$user->passport) }}" target="_black"> عرض جواز السفر  </a>  &nbsp;&nbsp;
															
														<a class="btn btn-primary " style="padding-right: 30px;padding-left: 30px;" href="{{asset('img/profiles/documents/'.$user->passport) }}" download> تحميل جواز السفر  </a> 

														</div>
													</div>
													<hr>
													<div class="row">
														<p class="col-sm-2 text-muted text-sm-right mb-0 mb-sm-3"> الهوية  الشخصية</p>
														<div class="col-auto profile-image">
															<!--<a href="#">-->
															<!--	<img class="rounded-circle" alt="User Image" src="{{asset('img/profiles/documents/'.$user->identity) }}" width="100px" height="100px">-->
															<!--</a>-->
															
															<a class="btn btn-primary " style="padding-right: 30px;padding-left: 30px;" href="{{asset('img/profiles/documents/'.$user->identity) }}" target="_black"> عرض الهوية  الشخصية  </a>  &nbsp;&nbsp;
															
														    <a class="btn btn-primary " style="padding-right: 30px;padding-left: 30px;" href="{{asset('img/profiles/documents/'.$user->identity) }}" download> تحميل الهوية  الشخصية  </a> 

														</div>
													</div>
												</div>
											</div>
											
											<!-- Edit Details Modal -->
											<div class="modal fade" id="edit_documents" aria-hidden="true" role="dialog">
												<div class="modal-dialog modal-dialog-centered" role="document" >
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">الشهادات والمستندات</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
														<form action="{{url('instructor/profile/update/documents')}}" method="POST" 
								                                name="le_form"  enctype="multipart/form-data">
								                            @csrf
															<div class="row form-row">    
																<input type="hidden" name="id" value="{{Auth::guard('instructors')->user()->id}}">
																<div class="col-12 col-sm-12">
																	<div class="form-group">
																		<label>جواز السفر</label>
																		<input type="file" name="passport" class="form-control" value="Miami" accept=".JPEG,.JPG,.PNG,.GIF,.TIF,.TIFF,.PDF">
																	</div>
																</div>	
																<div class="col-12 col-sm-12">
																	<div class="form-group">
																		<label>الهوية الشخصية</label>
																		<input type="file" name="identity" class="form-control" value="Miami" accept=".JPEG,.JPG,.PNG,.GIF,.TIF,.TIFF,.PDF">
																	</div>
																</div>	
															</div>
															<button type="submit" class="btn btn-primary btn-block">حفظ التغيير </button>
														</form>
														</div>
													</div>
												</div>
											</div>
											<!-- /Edit Details Modal -->
											
										</div>
									</div>
									<!-- /Personal Details -->
								</div>
								<!-- /Personal Details Tab --> 
								<!-- certificates experience Tab -->
								<div class="tab-pane fade" id="certificates_experience_tab">
									
									<div class="row">
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>شهادة الخبرة	</span>
													</h5>
													<h5 class="card-title d-flex ">
														<a class="edit-link btn btn-primary" href="{{url('instructor/print-certificates')}}"><i class="fa fa-edit mr-1"></i> تحميل الشهادة </a>
													</h5>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- certificates experience Tab --> 
								
								<!-- Personal Details Tab -->
								<div class="tab-pane fade" id="certificates_tab">
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>الشهادات	</span> 
														<!-- <a class="edit-link btn-primary" data-toggle="modal" href="#edit_certificates"><i class="fa fa-edit mr-1"></i>رفع الشهادات</a> -->
													</h5>
													

													<form action="{{url('instructor/profile/update/certificates')}}" method="POST" name="le_form"  enctype="multipart/form-data">
								              @csrf
															<div class="row form-row">    
																<input type="hidden" name="id" value="{{Auth::guard('instructors')->user()->id}}">
																<div class="col-12 col-sm-6">
																	<div class="form-group">
																		<label>شهادة الدكتوراه</label>
																		<input type="file" name="certificate_one" class="form-control" value="Miami" accept=".JPEG,.JPG,.PNG,.GIF,.TIF,.TIFF,.PDF">
																	</div>
																</div>
																<div class="col-12 col-sm-6">
																	<div class="form-group">
																	    <br>
																	    <a class="btn btn-primary " style="padding-right: 30px;padding-left: 30px;" href="{{asset('img/profiles/certificate/'.$user->certificate_one) }}" target="_black"> عرض    </a>  &nbsp;&nbsp;
														                <a class="btn btn-primary " style="padding-right: 30px;padding-left: 30px;" href="{{asset('img/profiles/certificate/'.$user->certificate_one) }}" download> تحميل  </a> 
																	</div>
																</div>
																<div class="col-12 col-sm-6">
																	<div class="form-group">
																		<label>شهادة الماجستير</label>
																		<input type="file" name="certificate_two" class="form-control" value="Miami" accept=".JPEG,.JPG,.PNG,.GIF,.TIF,.TIFF,.PDF">
																	</div>
																</div>
																<div class="col-12 col-sm-6">
																	<div class="form-group">
																	    <br>
																		<a class="btn btn-primary " style="padding-right: 30px;padding-left: 30px;" href="{{asset('img/profiles/certificate/'.$user->certificate_two) }}" target="_black"> عرض    </a>  &nbsp;&nbsp;
															            <a class="btn btn-primary " style="padding-right: 30px;padding-left: 30px;" href="{{asset('img/profiles/certificate/'.$user->certificate_two) }}" download> تحميل    </a> 
																	</div>
																</div>
																<div class="col-12 col-sm-6">
																	<div class="form-group">
																		<label>شهادة البكالوريوس</label>
																		<input type="file" name="certificate_three" class="form-control" value="Miami" accept=".JPEG,.JPG,.PNG,.GIF,.TIF,.TIFF,.PDF">
																	</div>
																</div>
																<div class="col-12 col-sm-6">
																	<div class="form-group">
																	    <br>

																		    <a class="btn btn-primary " style="padding-right: 30px;padding-left: 30px;" href="{{asset('img/profiles/certificate/'.$user->certificate_three) }}" target="_black"> عرض    </a>  &nbsp;&nbsp;
															                <a class="btn btn-primary " style="padding-right: 30px;padding-left: 30px;" href="{{asset('img/profiles/certificate/'.$user->certificate_three) }}" download> تحميل    </a> 
																	</div>
																</div>	
																
															</div>
															<button type="submit" class="btn btn-primary btn-block">حفظ التغيير </button>
													</form>

												</div>
											</div>
											
											
											
										</div>
									</div>
									<!-- /Personal Details -->
								</div>
								<!-- /Personal Details Tab --> 

								<!-- Personal Details Tab -->
								<div class="tab-pane fade" id="cv_tab">
									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-12">
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<!--<span>السيرة الذاتيه	</span> -->
														<!-- <a class="edit-link" data-toggle="modal" href="#edit_documents"><i class="fa fa-edit mr-1"></i>تعديل</a> -->
													</h5>
													<form action="{{url('instructor/profile/update/cv')}}" method="POST" name="le_form"  enctype="multipart/form-data">
								              @csrf
															<div class="row form-row">    
																<input type="hidden" name="id" value="{{Auth::guard('instructors')->user()->id}}">
																<div class="col-12 col-sm-6">
																	<div class="form-group">
																	<span>السيرة الذاتيه	</span> 
																		<input type="file" name="cv" class="form-control" value="Miami" accept=".JPEG,.JPG,.PNG,.GIF,.TIF,.TIFF,.PDF">
																	</div>
																</div>
																<div class="col-12 col-sm-6">
																	<div class="form-group">
																	    <br>

																		    <a class="btn btn-primary " style="padding-right: 30px;padding-left: 30px;" href="{{asset('img/profiles/cv/'.$user->cv) }}" target="_black"> عرض    </a>  &nbsp;&nbsp;
															                <a class="btn btn-primary " style="padding-right: 30px;padding-left: 30px;" href="{{asset('img/profiles/cv/'.$user->cv) }}" download> تحميل    </a> 
																	</div>
																</div>
																
																
																
																
															</div>
															<button type="submit" class="btn btn-primary btn-block">حفظ التغيير </button>
													</form>
												</div>
											</div>
											
											
											
										</div>
									</div>
									<!-- /Personal Details -->
								</div>
								<!-- /Personal Details Tab --> 

								<!-- Change Password Tab -->
								<div class="tab-pane fade" id="password_tab">
								
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">تغيير كلمة المرور</h5>
											<div class="row">
												<div class="col-md-10 col-lg-6">
														<form action="{{route('instructor.changepassword')}}" method="POST" name="le_form"  enctype="multipart/form-data">
															@csrf
															<input type="hidden" name="id" value="{{Auth::guard('instructors')->user()->id}}">
														<!-- <div class="form-group">
															<label>كلمة المرور الحالية</label>
															<i class="la la-lock" onclick="myFunction()"></i>
															<input type="password" name="current-password" class="form-control" id="user-password">
														</div>
														<div class="form-group">
															<label>كلمة المرور الجديدة</label>
															<i class="la la-lock" onclick="myFunction()"></i>
															<input type="password" name="new-password" class="form-control" name="new-password">
														</div> -->

														<fieldset class="form-group position-relative has-icon-left">
															<input type="password" name="current-password" class="form-control form-control-lg input-lg" id="user-password"
															placeholder="ادخل كلمة السر الحالية" required>
														
															<div class="form-control-position">
															<i class="la la-lock" onclick="myFunction()"></i>
															</div>
														</fieldset>

																				<fieldset class="form-group position-relative has-icon-left">
															<input type="password" name="new-password" class="form-control form-control-lg input-lg" id="user-password-confirm"
															placeholder="ادخل كلمة السر الجديدة" required>
														
															<div class="form-control-position">
															<i class="la la-lock" onclick="myFunction()"></i>
															</div>
														</fieldset>



														<button class="btn btn-primary" type="submit">حفظ التغيير</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Change Password Tab -->

								<!-- remove acount tab  -->
								<div  class="tab-pane fade" id="remove_acount_tab">
								
									<div class="card">
										<div class="card-body">
											<h5 class="card-title text-danger"> تحذير إذا ضغطت على حذف الحساب : سوف يتم إلغاء الحساب بالكامل وجميع الدورات الخاصة بك، سوف تفقد رصيدك اذا كان أقل من 50 دولار ، واذا كان أكثر من ذلك سيتم تحويله لك لاحقاً </h5>
											<div class="row">
											<div class="col-md-10 col-lg-6">
	                                			<input type="hidden" name="id" value="{{Auth::guard('instructors')->user()->id}}">
												<a class="edit-link" data-toggle="modal" href="#delete_acount">
													<button class="btn btn-primary" type="submit">حذف الحساب </button>
												</a>
											</div>
										</div>
									</div>
									</div>
								</div>
								<!-- /remove acount  Tab -->
								
							</div>
						</div>
					</div>			
					</div>
                  </div>
                </div>
              </div>
            </div>
        </div>




        <!-- Delete Modal -->
			<div class="modal fade" id="delete_acount" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
					
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title"></h4>
								<p class="mb-4">هل انت متأكد من حذف الحساب</p>
								<div class="row text-center">
									
									<div class="col-sm-6">
										<form method="post" action="{{route('remove-acount')}}">
	                    @csrf
	                    <!-- @method('delete') -->

	                    <input type="hidden" name="id" id="cat_id">
	                   
	                   	<fieldset class="form-group position-relative has-icon-left">
			                  <input type="password" name="your-password" class="form-control form-control-lg input-lg" id="your-password"
			                      placeholder="ادخل كلمة المرور" required>       
			                  <div class="form-control-position">
			                      <i class="la la-lock" onclick="deleteAcountFunction()"></i>
			                  </div>
			                </fieldset>

												
									</div>
									<div class="col-sm-6">
										<button type="submit" class="btn btn-primary">حذف</button>
	                  </form>
										<button type="button" class="btn btn-danger" data-dismiss="modal">تراجع عن الحذف</button>
									</div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /Delete Modal -->



	<script src="http://code.jquery.com/jquery-3.4.1.js"></script>


	 
<script>
    function myFunction() {
      var x = document.getElementById("user-password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }

       var x = document.getElementById("user-password-confirm");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }


    function deleteAcountFunction() {
     
       var x = document.getElementById("your-password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
</script>


@endsection