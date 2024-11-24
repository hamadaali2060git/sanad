<div>
    <fieldset class="form-group position-relative has-icon-left m-0">
        <input type="text" class="form-control" placeholder="بحث" wire:model="query">
        <div class="form-control-position">
            <i class="ft-search"></i>
        </div>
    </fieldset>


    @if($results)

    <div class=" media-list">
        @foreach($results as $user)
        <a href="{{url('instructor/chat/'.$user->id.'/create')}}" class="media border-0">
            <div class="media-left pr-1">
                <span class="avatar avatar-md avatar-busy">
                    <img class="media-object rounded-circle" src="https://bootdey.com/img/Content/avatar/avatar1.png"
                        alt="Generic placeholder image">
                    <i></i>
                </span>
            </div>
            <div class="media-body w-100">
                <h6 class="list-group-item-heading">{{$user->first_name .' '. $user->last_name}}
                    <!-- <span class="font-small-3 float-right info">9:04 PM</span> -->
                </h6>
            </div>
        </a>
        @endforeach

    </div>

    @endif







</div>


<!-- @if($results)
<ul class="list-group mt-2">
    @foreach($results as $user)
    <li class="list-group-item">
        {{ $user->name }} - {{ $user->email }}
    </li>
    @endforeach

</ul>
@endif -->