<!doctype html>
<html class="no-js" lang="en">
    <?php
         $user_auth=Auth::guard('instructors')->user();
    ?>
<head>
    @include('layout.front.head')
</head>



<body>
  @php
    if(session()->get('locale')){
      $langg=session()->get('locale');
      App::setLocale($langg);
    }else{
      $langg=app()->getLocale();
      App::setLocale($langg);
    }
  @endphp
    <!-- @if(!Request::is('user-login','instructor-signup','student-signup','register-users','traveling-signup'))
        <header>

        </header>
    @endif  -->
    <header>
        @if($user_auth)
            @include('layout.front.header-login')
        @else
            @include('layout.front.header')
            @endif
    </header>
    @yield('content')

    <!-- @if(!Request::is('login/user','create/acount','register-users','instructor-signup'))

    @endif -->

    @include('layout.front.footer')
</body>

</html>
