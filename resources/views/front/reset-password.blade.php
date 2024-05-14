@extends('layout.front.main')
@section('content')

    <section class="form-section">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-4">
                     <br><br> <br>
                    <h6>Kennwort ändern</h6>
                    <hr>


                    @if(session()->has('message'))
                        @include('admin.includes.alerts.success')
                    @endif

                    @if(Session::has('errorss'))
                        <span class="text-danger">{{Session::get('errorss')}}</span>
                    @endif



						        @if(session()->has('message'))
				                @include('admin.includes.alerts.success')
				            @endif

				            @if(Session::has('errorss'))
				               <span class="text-danger">{{Session::get('errorss')}}</span>
				            @endif

							<form class="form-horizontal form-simple"  novalidate method="POST" action="{{route('reset-user-password-post')}}">
                       				 @csrf
								<input type="hidden" name="token" value="{{ $token }}">
								<div class="form-group">

									<div style="position:relative" id="eye-password-0">
										<label for="email">Geben Sie das neue Passwort ein</label>
										<input  type="password" class="form-control @error('password') is-invalid @enderror" name="password"  style="padding-right: 60px;">
							    	</div>

							    	@error('password')
			                                <strong>{{ $message }}</strong>
			                        @enderror

								</div>
								<div class="form-group">

									<div style="position:relative" id="eye-password-0">
										<label for="email">Bestätige das Passwort</label>
										<input  type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"  style="padding-right: 60px;">
							    	</div>

							    	@error('password_confirmation')
			                                <strong>{{ $message }}</strong>
			                        @enderror

								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block"> speichern </button>
								</div>

							</form>







                </div>





            </div>
        </div>
    </section>
    <!-- end login -->

@endsection
