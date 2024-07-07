@extends('layout.admin_main')
@section('content')

<div class="content-header row">
	<div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
		<h3 class="content-header-title mb-0 d-inline-block">الفيديوهات</h3><br>
		<div class="row breadcrumbs-top d-inline-block">
			<div class="breadcrumb-wrapper col-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">الرئيسية</a>
					</li>

					<li class="breadcrumb-item active">الفيديوهات
					</li>
				</ol>
			</div>
		</div>
	</div>
	<div class="content-header-right col-md-6 col-12">
		<div class="dropdown float-md-right">

			<a href="#Add_Specialities_details" data-toggle="modal" class="btn btn-primary float-right mt-2">اضافة</a>

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
					<h4 class="card-title"> </h4>
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
						<p class="card-text"></p>
						<table class="table table-striped table-bordered keytable-integration">

							<thead>
								<tr>
									<th>الفيديو</th>

									<th class="text-right">أكشن</th>
								</tr>
							</thead>
							<tbody>

								@foreach ($videos as $_item)
								<tr>
									<td>
										<video width="200" height="100" controls>
											<source src="{{asset('img/videos/'.$_item->video) }}" type="video/mp4">
											<source src="{{asset('img/videos/'.$_item->video) }}" type="video/ogg">
											Your browser does not support the video tag.
										</video>
										<!-- <a href="profile" class="avatar avatar-sm mr-2">
															<img class="avatar-img" src="{{asset('img/videos/'.$_item->video) }}" alt="Speciality">
														</a> -->
									</td>

									<td class="text-right">

										<a class="btn btn-sm bg-success-light edit-course" data-toggle="modal"
											data-image="{{ $_item->image }}" data-catid="{{ $_item->id }}"
											data-target="#edit{{$_item->id}}">
											<button type="button" class="btn btn-outline-success "><i
													class="la la-edit"></i></button>
											<span class="editcourse">تعديل </span>
										</a>
										<a data-toggle="modal" data-catid="{{ $_item->id }}"
											data-target="#delete{{$_item->id}}"
											class="btn btn-sm bg-danger-light delete-course">
											<button type="button" class=" btn btn-outline-warning"><i
													class="la la-trash-o"></i></button>
											<span class="deletecourse">حذف </span>
										</a>
									</td>



								</tr>


								<!-- Edit Details Modal -->
								<div class="modal fade" id="edit{{$_item->id}}" aria-hidden="true" role="dialog">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title">تعديل </h5>
												<button type="button" class="close" data-dismiss="modal"
													aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">

												<form method="post" action="{{route('videos.update','test')}}"
													enctype="multipart/form-data">
													@csrf
													@method('put')

													<div class="row form-row">
														<input type="hidden" name="id" value="{{$_item->id}}">

														<div class="col-12 col-sm-12">
															<div class="form-group">
																<label>الصوره </label>
																<input type="file" name="image" class="form-control"
																	accept=".JPEG,.JPG,.PNG,.GIF,.TIF,.TIFF">
																<input type="hidden" name="url" class="form-control"
																	id="image">
															</div>
														</div>

													</div>
													<button type="submit" class="btn btn-primary btn-block">حفظ
														التغيير</button>
												</form>
											</div>
										</div>
									</div>
								</div>
								<!-- /Edit Details Modal -->

								<!-- Delete Modal -->
								<div class="modal fade" id="delete{{$_item->id}}" aria-hidden="true" role="dialog">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">

											<div class="modal-body">
												<div class="form-content p-2">
													<h4 class="modal-title">Delete</h4>
													<p class="mb-4">هل انت متأكد من حذف هذا العنصر</p>
													<div class="row text-center">
														<div class="col-sm-3">
														</div>
														<div class="col-sm-2">
															<form method="post"
																action="{{route('videos.destroy','test')}}">
																@csrf
																@method('delete')
																<input type="hidden" name="id" value="{{ $_item->id }}">
																<button type="submit" class="btn btn-primary">حذف
																</button>
															</form>
														</div>
														<div class="col-sm-2">
															<button type="button" class="btn btn-danger"
																data-dismiss="modal">Close</button>
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

					</table>
				</div>
			</div>
		</div>
	</div>
	</div>


	<!-- Add Modal -->
	<div class="modal fade" id="Add_Specialities_details" aria-hidden="true" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">أضافة فيديو جديد</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{route('videos.store')}}" method="POST" name="le_form" enctype="multipart/form-data">
						@csrf
						<div class="row form-row">
							<div class="col-12 col-sm-6">
								<div class="form-group">
									<label>العنوان عربي</label>
									<input type="text" name="title_ar" class="form-control">
								</div>
							</div>
							<div class="col-12 col-sm-6">
								<div class="form-group">
									<label>العنوان انجليزي</label>
									<input type="text" name="title_en" class="form-control">
								</div>
							</div>

							<div class="col-12 col-sm-12">
								<div class="form-group">
									<label>الصوره </label>
									<input type="file" name="image" class="form-control"
										accept=".JPEG,.JPG,.PNG,.GIF,.TIF,.TIFF">
									<input type="hidden" name="url" class="form-control" id="image">
								</div>
							</div>
							<!-- <div class="col-12 col-sm-12">
								<div class="form-group">
									<label>الفيديو </label>
									<input type="file" name="video" class="form-control" accept="">
								</div>
							</div> -->



							<div class="col-md-12 ">
								<div class=" col-md-12">
									<div class="form-group">
										<label>ارفق الفيديو</label>
										<input type="file" name="file" id="video1"
											onchange="saveVideo(video1,'1','videopath1','progress-bar1','hidden1','videovalue1')"
											class="form-control fileId" accept=".MP4,.FLV,.ogg,.webm,.mov">
										<span id="fileError" style="color: red;"></span>
									</div>
								</div>

								<div class="col-md-12 hidden1" id="hidden1">
									<video controls="controls" id="videopath1" width="200">
										<source src="" type="video/mp4">
									</video>
									<input type="hidden" name="video" class="videovalue" id="videovalue1">
								</div>
								<div class="col-md-12 ">
									<div class="form-group">
										<div class="progress prog1">
											<div class="progress-bar progress-bar1 prog-bar1 progress-bar-striped progress-bar-animated bg-danger"
												role="progressbar" aria-valuenow="0" aria-valuemin="0"
												aria-valuemax="100" style="width: 0%">
											</div>
										</div>
									</div>
								</div>
							</div>


						</div>
						<button type="submit" class="btn btn-primary btn-block">حفظ </button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /ADD Modal -->


</section>


<script>
	$('.loader-container').hide();
	let videoid = 1;
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
				url: "{{route('save-admin-video')}}",
				type: 'POST',
				data: formData,
				processData: false,
				contentType: false,
				success: function (data) {
					console.log(data + '>>>>>>>>>>>>>>>>>>>>><<<<' + hiddenclassss);
					//  var div = document.getElementById(hiddenclassss);
					// div.classList.remove(hiddenclassss);
					$('.' + hiddenclassss).show();
					$('#' + videopath).attr('src', "https://sanad-qatar.qa/img/videos/" + data);
					document.getElementById(videovalue).value = data;
					// document.getElementById(video).value = 'video.png';
				}
			})
		})
	}
</script>
<!--
	$('#delete').on('show.bs.modal', function (event) {

		      var button = $(event.relatedTarget) 

		      var cat_id = button.data('catid') 
		      var modal = $(this)

		      modal.find('.modal-body #cat_id').val(cat_id);
		})


</script> -->

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