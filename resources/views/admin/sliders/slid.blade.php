 @if(Session::has('success'))

    <div class="alert alert-success" id="alert">
        <strong>Success:</strong> {{Session::get('success')}}
    </div>

@elseif(session('error'))
    <div class="alert alert-danger" id="alert">
        
        <strong>Error:</strong>{{Session::get('error')}}
    </div>
@endif


 @if(isset($message))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif 

             @if (session('message'))
            <div class="alert alert-success">
            {{ session('message') }}
            </div>
          @endif