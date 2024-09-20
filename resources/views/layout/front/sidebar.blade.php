@php
if(session()->get('locale')){
$langg=session()->get('locale');
App::setLocale($langg);
}else{
$langg=app()->getLocale();
App::setLocale($langg);
}
@endphp
<div class="bg-light p-3 pt-4 mb-3 bg-white text-center">
    @if(Auth::guard('instructors')->user()->photo)
    <img src="{{asset('img/profiles/students/'.Auth::guard('instructors')->user()->photo) }}"
        class="img-thumbnail profile-img-edit">
    @else
    <img src="{{asset('img/profiles/profile.png') }}" class="img-thumbnail profile-img-edit">
    @endif
    <!-- <div class="image-upload">
                            <label for="file-input">
                                <i class="fas fa-pen"></i>
                            </label>

                            <input id="file-input" type="file" />
                        </div> -->

    <p class="text-bold-500 text-dark text-extra-large mb-3">{{Auth::guard('instructors')->user()->name}}</p>

    <p class="text-medium2">{{$user->email}}</p>

</div>

<div class="bg-light margin-45px-bottom sm-margin-25px-bottom bg-white p-4">
    <a class="profile-links" href="{{url('my-profile')}}">
        <i class="fas fa-user pr-2"></i> {{__('front.My Profile')}}
    </a>
    <a class="profile-links" href="{{url('my-courses')}}">
        <i class="fas fa-video pr-2"></i> {{__('front.My Courses')}}
    </a>

    <!-- <a class="profile-links" href="mywishlist.html">
                            <i class="fas fa-heart pr-2"></i> My Wishlist
                        </a> -->



    <a class="profile-links" href="{{url('student-password')}}">
        <i class="fas fa-money-check"></i> {{__('front.Update Password')}}
    </a>
    <div class=" bg-light text-center mt-2 pt-2 pb-2">
        <a class="dropdown-item main-color font-weight-600 text-medium" href="{{ route('signoutinstructors') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out"></i>
            {{__('front.Logout')}}
        </a>
        <form id="logout-form" action="{{ route('signoutinstructors') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>