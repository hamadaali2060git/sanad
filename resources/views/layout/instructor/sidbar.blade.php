    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <!-- <li class=" nav-item"><a href="#"><i class="la la-bolt"></i><span class="menu-title" data-i18n="nav.flot_charts.main">الرئيسية</span></a>
          <ul class="menu-content">            
            <li  class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"> 
                <a class="menu-item" href="{{url('admin/dashboard')}}" data-i18n="nav.flot_charts.flot_pie_charts">الرئيسية</a>
            </li>
          </ul>
        </li> -->
       
      
        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
            <a href="{{url('/')}}">
                <i class="la la-envelope"></i><span class="menu-title" data-i18n="">الذهاب للموقع</span></a>
        </li>
        <li class="nav-item {{ Request::is('instructor/dashboard') ? 'active' : '' }}">
            <a href="{{url('instructor/dashboard')}}">
                <i class="la la-envelope"></i><span class="menu-title" data-i18n="">الرئيسية</span></a>
        </li>
        <li class="nav-item {{ Request::is('instructor/profile') ? 'active' : '' }}">
            <a href="{{url('instructor/profile')}}">
                <i class="la la-envelope"></i><span class="menu-title" data-i18n="">حسابي</span></a>
        </li>
        <!-- <li class="nav-item {{ Request::is('instructor/bankdetails') ? 'active' : '' }}">
            <a href="{{url('instructor/bankdetails')}}">
                <i class="la la-envelope"></i><span class="menu-title" data-i18n="">معلومات البنك</span></a>
        </li>
        <li class="nav-item {{ Request::is('instructor/western-info') ? 'active' : '' }}">
            <a href="{{url('instructor/western-info')}}">
                <i class="la la-envelope"></i><span class="menu-title" data-i18n="">معلومات Western Union</span></a>
        </li> -->
        
        <li class="nav-item {{ Request::is('instructor/courses') ? 'active' : '' }}">
            <a href="{{ url('instructor/courses') }}"> <i class="la la-envelope"></i><span class="menu-title" data-i18n=""> الدورات الاونلاين</span></a>
        </li>
        <!-- <li class="nav-item {{ Request::is('instructor/terms') ? 'active' : '' }}">
            <a href="{{url('instructor/terms')}}">
                <i class="la la-envelope"></i>
                <span class="menu-title" data-i18n="">إرشادات المدرب</span>
            </a>
        </li> -->
        <li class="nav-item {{ Request::is('instructor/instructor-video') ? 'active' : '' }}">
            <a href="{{url('instructor/instructor-video')}}">
                <i class="la la-envelope"></i>
                <span class="menu-title" data-i18n=""> فيديوهات إرشادية</span>
            </a>
        </li>
        <!-- <li class="nav-item {{ Request::is('instructor/bills') ? 'active' : '' }}">
            <a href="{{ url('instructor/bills') }}">
                <i class="la la-envelope"></i><span class="menu-title" data-i18n=""> ارباحي</span></a>
        </li>
        <li class="nav-item {{ Request::is('instructor/transfers') ? 'active' : '' }}">
            <a href="{{ url('instructor/transfers') }}">
                <i class="la la-envelope"></i><span class="menu-title" data-i18n=""> تحويلات البنك</span></a>
        </li> -->
        

        
        
        
       
        <!-- <li class="nav-item {{ Request::is('instructor/agreements') ? 'active' : '' }}">
            <a href="{{url('instructor/agreements')}}">
                <i class="la la-envelope"></i>
                <span class="menu-title" data-i18n="">اتفاقية المدرب</span>
            </a>
        </li> -->
       

        


       
        
        
      </ul>
    </div>
  </div>