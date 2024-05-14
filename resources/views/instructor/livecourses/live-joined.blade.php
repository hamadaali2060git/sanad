
@extends('layout.instructor.main')
@section('content')	

@toastr_css


    <div class="content-header row">
                    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                      <h3 class="content-header-title mb-0 d-inline-block"> الطلاب المسجلين ف هذه الدورة </h3><br>
                      <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('instructor/dashboard')}}">الرئيسية</a>
                            </li>   
                            
                            <li class="breadcrumb-item active">الطلاب
                            </li>
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
                  <h4 class="card-title">الدورات المباشرة (اونلاين)</h4>
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
                            <th class="text-center">#</th>
                            <th class="text-center">اسم الطالب </th>

                            <th class="text-center">التاريخ</th>
                            
                        </tr>
                      </thead>
                      <tbody>
                        
                      @foreach ($subscriptions as $key=>$_item)
                        <tr>
                            <td class="text-center">{{$key}}</td>
                            <td class="text-center">
                                <!--<a href="{{url('admin/student-profile/'.$_item->instructor->id) }}">-->
                              {{ $_item->instructor->first_name .' '. $_item->instructor->last_name }}
                                <!--</a>-->
                            </td>
                          
                           
                            <td class="text-center">
                                {{ $_item->created_at->format('Y-m-d  H:i' )   }}
                            </td>
                            

                        </tr>
                      @endforeach
                        
                      </tbody>
                    </table>
                </div>
                </div>
                </div>
              </div>
            </div>
        

            <div class="modal fade" id="delete" aria-hidden="true" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document" >
                                                        <div class="modal-content">
                                                    
                                                            <div class="modal-body">
                                                                <div class="form-content p-2">
                                                                    <h4 class="modal-title">حذف!</h4>
                                                                    <p class="mb-4">هل انت متأكد من حذف هذا العنصر</p>
                                                                    <div class="row text-center">
                                                                        <div class="col-sm-3">
                                                                        </div>
                                                                        <div class="col-sm-2">
                                                                            <form method="post" action="{{route('courses.destroy','test')}}">
                                                                                 @csrf
                                                                                 @method('delete')
                                                                                 <input type="hidden" name="id" id="cat_id">
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
    </section>



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


<script> 
        
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