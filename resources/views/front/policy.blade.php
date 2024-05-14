@extends('layout.front.main')
@section('content')

@php
if(session()->get('locale')){
$langg=session()->get('locale');
App::setLocale($langg);
}else{
$langg=app()->getLocale();
App::setLocale($langg);
}
@endphp
<section class="form-section">
  <div class="container">
    <div class="row">

      <div class="col-md-12">
        <h5 class="text-dark font-weight-600">{{__('front.privacy policy')}}</h5>
        <hr>

        <p>
          @if($langg=='ar')
          {{$contact->policy_ar }}
          @else
          {{$contact->policy_en}}
          @endif
          <!-- 
          سياسة الخصوصية هذه توفر طريقة جمع البيانات الخاصة بك بالطريقة المستخدمة من قبل شركة سند للتدريب، عن طريق
          الدخول إلى الخدمات التي تقدمها شركة سند للتدريب إنك توافق على جمع واستخدام البيانات الخاصة بك عن طريق شركة سند
          للتدريب، وبعض مقدمي الخدمة طرف ثالث بالطريقة المنصوص عليها في سياسة الخصوصية هذه. إذا كنت لا توافق على سياسة
          الخصوصية هذه، يرجى عدم استخدام الموقع الالكتروني لشركة سند المتقدم للتدريب. من خلال قبول سياسة الخصوصية أثناء
          التسجيل، يجب أن توافق صراحة على استخدامنا والكشف عن المعلومات الشخصية الخاصة بك وفقاً لسياسة الخصوصية هذه. يتم
          تضمينها في سياسة الخصوصية هذه و تخضع لشروط اتفاقية المستخدم. -->
        </p>



        <!-- <p>
        <h6>لماذا نستخدم سند</h6>
        تقدم شركة سند المتقدم للتدريب خدمة تقديم الدورات المباشرة من خلال موقعها الالكتروني والتطبيق. نريدك أن تشعر
        بالراحة عند استخدام موقعنا و تشعر بالأمان عند مشاركتك المعلومات الخاصة بك معنا، و بالتالي نحن فخورون للغاية
        بالتزامنا لحماية خصوصيتك. يرجى مواصلة قرأة السياسة التالية لفهم كيف يتم التعامل مع المعلومات الشخصية الخاصة بك
        كما تمكنك من الإستفادة الكاملة من موقعنا.
        </p> -->

        <h6></h6>

        <!-- <p>
          نحن نوظف شركات أخرى و أفراد لأداء المهام نيابة عنا. ومن الأمثلة على ذلك مباشرة الطلبات، إرسال البريد
          الإلكتروني، تحليل البيانات، تقديم المساعدة والتسويق، تقديم نتائج البحث، تجهيز مدفوعات


        </p> -->





      </div>





    </div>
  </div>
</section>
@endsection