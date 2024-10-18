
@extends('layout.admin_main')
@section('content')	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
    
		<div class="content-header row">
			        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
			          <h3 class="content-header-title mb-0 d-inline-block">المدربين</h3><br>
			          <div class="row breadcrumbs-top d-inline-block">
			            <div class="breadcrumb-wrapper col-12">
			              <ol class="breadcrumb">
			                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">الرئيسية</a>
			                </li>
			                
			                <li class="breadcrumb-item active">المدربين
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
                    <div class="card-body">
                        
                        <div class="row">
	                        <div class="col-md-10">
	                        	<form action="{{url('admin/instructor-filter')}}" method="get">
	                                <!--@csrf-->
									<div class="row form-row">
										<div class="col-md-6">
											<div class="form-group">
												<label>بحث عن مدربين </label>
												<select name="filter" class="form-control select2-diacritics "  placeholder="بحث">
                                                    <option  value="status">تم التحقق من شخصيتهم</option>
                                                    <option  value="suspended">المعلقين</option>
                                                    <option  value="blocked">المحذوفين</option>
                                                    <option  value="published"> الناشرين دورة علي الاقل</option>
                                                </select>
											</div>
										</div>
										
										
										<div class="col-md-4" style="margin-top: 5px">
											<label> </label>
											<button type="submit" class="btn btn-primary btn-block"> بحث  </button>
										</div>
									</div>
								</form>
							</div>
						</div>
				        <br>
				        
						<div class="table-responsive">
		                    <table class="table table-striped table-bordered keytable-integration">
		                        <thead>
									<tr>
									    <th>#</th>
									    <th>id</th>
										<th class="text-center">اسم المدرب </th>
										
                    <th class="text-center">البريد الالكتروني </th>
                    <th class="text-center">عدد الدورات </th>
										<!-- <th class="text-center">تحقق</th>
										<th class="text-center">معلق/ غير معلق</th>
										<th class="text-center">محذوف / غير محذوف </th> -->
										<!-- <th class="text-center">العمليات</th> -->
									</tr>
								</thead>
								<tbody>
									@foreach ($instructors as $key=>$_item)
									<tr>	
									    <td>{{$key}}</td>
									    <td >{{ $_item->id }}</td>
										<td class="text-center" style="width:190px !important;">
											<a href="{{url('admin/instructor-profile/'.$_item->id) }}">{{ $_item->name }}</a>
										</td>
										<td class="text-center">
                      {{ $_item->email }}
										</td>
										<td class="text-center">
                      {{ $_item->course_count }}
										</td>
										<!-- <td>
                      <div class="status-toggle">
                        <input type="checkbox" data-id="{{ $_item->id }}" name="status"  class="status-switch" {{ $_item->status == 1 ? 'checked' : '' }}>
                      </div>
                    </td>
										
										<td>
                      <div class="status-toggle">
                        <input type="checkbox" data-id="{{ $_item->id }}" name="suspended"  class="suspended-switch" {{ $_item->suspended == 1 ? 'checked' : '' }}>
                      </div>
                    </td>
                    <td>
                      <div class="status-toggle">
                        <input type="checkbox" data-id="{{ $_item->id }}" name="blocked"  class="blocked-switch" {{ $_item->blocked == 1 ? 'checked' : '' }}>
                      </div>
                    </td> -->
										
										<!-- <td class="text-right">			
											
											<a  data-toggle="modal" data-catid="{{ $_item->id }}" data-target="#delete" class="delete-course">
				                <button type="button" class=" btn btn-outline-warning"><i class="la la-trash-o"></i></button>
				                <span class="deletecourse">حذف </span>
				              </a>
				            </td> -->
									</tr>
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



			<!-- Delete Modal -->
			<div class="modal fade" id="delete" aria-hidden="true" role="dialog">
				<div class="modal-dialog modal-dialog-centered" role="document" >
					<div class="modal-content">
				
						<div class="modal-body">
							<div class="form-content p-2">
								<h4 class="modal-title">حذف</h4>
								<p class="mb-4">هل انت متأكد من حذف هذا العنصر ؟</p>
								<div class="row text-center">
									<div class="col-sm-3">
									</div>
									<div class="col-sm-2">
										<form method="post" action="{{route('instructors.destroy','test')}}">
	                                   		 @csrf
	                                         @method('delete')
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


 <!--<script src="{{asset('js/app.js')}}"></script> -->
 
 <script>
 			// instructor.update.status
    	let elems = Array.prototype.slice.call(document.querySelectorAll('.status-switch'));
        elems.forEach(function(html) {
            let switchery = new Switchery(html,  { size: 'small' });
        });
        $(document).ready(function(){
          $('.status-switch').change(function () {
            let status = $(this).prop('checked') === true ? 1 : 0;
            let userId = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('instructor.update.status') }}',
                data: {'status': status, 'user_id': userId},
                success: function (data) {
                  toastr.options.closeButton = true;
                  toastr.options.closeMethod = 'fadeOut';
                  toastr.options.closeDuration = 100;
                  toastr.success(data.message);
                }
            });
          });
        });
    
      // instructor update suspended
      

      // instructor update blocked
      

</script>
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
