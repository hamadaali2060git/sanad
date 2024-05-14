@extends('layout.front.main')
@section('content')
<!-- start contact -->
@php
if(session()->get('locale')){
$langg=session()->get('locale');
App::setLocale($langg);
}else{
$langg=app()->getLocale();
App::setLocale($langg);
}
@endphp
<section class="form-section contact-form">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <h6>{{__('front.Keep in touch with us')}}</h6>
                <hr>


                <form>


                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="{{__('front.Name')}}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="{{__('front.Email')}}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="{{__('front.Phone No')}}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" cols="30" rows="7">{{__('front.our Message')}}</textarea>
                            </div>
                        </div>

                    </div>





                    <button type="submit" class="w-100 btn header-btn text-large font-weight-bold">
                        {{__('front.Send Message')}}</button>


                </form>





            </div>





        </div>
    </div>
</section>
<!-- end contact -->

@endsection