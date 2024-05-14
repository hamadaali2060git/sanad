@php
  if(session()->get('locale')){
    $langg=session()->get('locale');
    App::setLocale($langg);
  }else{
    $langg=app()->getLocale();
    App::setLocale($langg);
  }
@endphp
<!-- title -->
<title>Online Courses</title>

<!-- meta tags -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
<meta name="author" content="">
<meta name="description" content="">
<meta name="keywords" content="">

<!-- favicon -->
<link rel="shortcut icon" href="{{asset('img/favicon.png')}}">

<!-- bootstrap -->
<link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}" />

<!-- font-awesome icon -->
<link rel="stylesheet" href="{{asset('front/css/font-awesome.min.css')}}" />

<!-- swiper carousel -->
<link rel="stylesheet" href="{{asset('front/css/swiper.min.css')}}">

<!-- bootsnav -->
<link rel="stylesheet" href="{{asset('front/css/bootsnav.css')}}">

<!-- style -->
@if($langg=='ar')
  <link rel="stylesheet" href="{{asset('front/css/style_rtl.css')}}" />
@else
  <link rel="stylesheet" href="{{asset('front/css/style.css')}}" />
@endif



<!-- responsive css -->
<link rel="stylesheet" href="{{asset('front/css/responsive.css')}}" />



 <!-- Data table -->
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
