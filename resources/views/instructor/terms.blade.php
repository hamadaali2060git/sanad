@extends('layout.instructor.main')
@section('content')

@php  
    
    if(session()->get('locale')){
        $langg=session()->get('locale');
    }else{
        $langg=app()->getLocale();
    }
@endphp 

@if($langg == 'ar')
    <style type="text/css">
        #privacy, #about{
            text-align: right; 
        }     
    </style>
@else
@endif
    <section id="privacy" class="" style="background-color: white;
    padding: 16px;">        
        <!--<div class=" text-center">-->
        <!--    <h3>منصة كوتبانه لبيع الكتب العربية الرقمية حول العالم</h3>-->
        <!--      دليل المؤلف :  تعليمات انشاء حساب ونشر الكتب-->
        <!--</div>-->
        <div class="container">
        @if($langg == 'ar')
            {!! $contact->terms_ar !!}
        @else
            {!! $contact->terms_en !!}
        @endif
        </div>

    </section>
@endsection