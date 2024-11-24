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


  <!-- Start of LiveChat (www.livechat.com) code -->
  <script>
    window.__lc = window.__lc || {};
    window.__lc.license = 18904863;
    window.__lc.integration_name = "manual_onboarding";
    window.__lc.product_name = "livechat";
    ; (function (n, t, c) { function i(n) { return e._h ? e._h.apply(null, n) : e._q.push(n) } var e = { _q: [], _h: null, _v: "2.0", on: function () { i(["on", c.call(arguments)]) }, once: function () { i(["once", c.call(arguments)]) }, off: function () { i(["off", c.call(arguments)]) }, get: function () { if (!e._h) throw new Error("[LiveChatWidget] You can't use getters before load."); return i(["get", c.call(arguments)]) }, call: function () { i(["call", c.call(arguments)]) }, init: function () { var n = t.createElement("script"); n.async = !0, n.type = "text/javascript", n.src = "https://cdn.livechatinc.com/tracking.js", t.head.appendChild(n) } }; !n.__lc.asyncInit && e.init(), n.LiveChatWidget = n.LiveChatWidget || e }(window, document, [].slice))
  </script>
  <noscript><a href="https://www.livechat.com/chat-with/18904863/" rel="nofollow">Chat with us</a>, powered by <a
      href="https://www.livechat.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
  <!-- End of LiveChat code -->




  @include('layout.front.footer')
</body>

</html>