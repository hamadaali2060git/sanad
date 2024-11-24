@extends('layout.instructor.main')
@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('admin/css-rtl/pages/chat-application.css')}}">
<div class="sidebar-left sidebar-fixed">
    <div class="sidebar" style="height: 10%;">
        <div class="sidebar-content card d-none d-lg-block">
            <div class="card-body chat-fixed-search"
                style="box-shadow: 0 4px 20px 1px rgba(0, 0, 0, .06), 0 1px 4px rgba(0, 0, 0, .08);">
                <!-- <fieldset class="form-group position-relative has-icon-left m-0">
                        <input type="text" class="form-control" id="iconLeft4" placeholder="Search user">
                        <div class="form-control-position">
                            <i class="ft-search"></i>
                        </div>
                    </fieldset> -->
                <livewire:search-user />
                <!-- <fieldset class="form-group position-relative has-icon-left m-0">
                        <input type="text" class="form-control" placeholder="بحث" wire:model="query">
                        <div class="form-control-position">
                            <i class="ft-search"></i>
                        </div>
                    </fieldset> -->
            </div>

        </div>
    </div>
    <div class="sidebar" style="height: 90%;">
        <div class="sidebar-content card d-none d-lg-block">
            <!-- <div class="card-body chat-fixed-search"> -->
            <!-- <fieldset class="form-group position-relative has-icon-left m-0">
                    <input type="text" class="form-control" id="iconLeft4" placeholder="Search user">
                    <div class="form-control-position">
                        <i class="ft-search"></i>
                    </div>
                </fieldset> -->

            <!-- <fieldset class="form-group position-relative has-icon-left m-0">
                    <input type="text" class="form-control" placeholder="بحث" wire:model="query">
                    <div class="form-control-position">
                        <i class="ft-search"></i>
                    </div>
                </fieldset> -->
            <!-- </div> -->
            <div id="users-list" class="list-group position-relative">
                <div class=" media-list">
                    @foreach($chats as $chat)
                    @if($chat->users->count() === 2)
                    @foreach ($chat->users as $user)
                    @if($user->type === 'instructor')
                    <a href="{{url('instructor/chat/user/'.$chat->id)}}" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md avatar-busy">
                                <img class="media-object rounded-circle"
                                    src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                    alt="Generic placeholder image">
                                <i></i>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">{{$user->first_name .' '. $user->last_name}}
                                <!-- <span class="font-small-3 float-right info">9:04 PM</span> -->
                            </h6>
                            <!-- <p class="list-group-item-text text-muted mb-0"><i
                                    class="ft-check primary font-small-2"></i> Thank you
                                <span class="float-right primary">
                                    <span class="badge badge-pill badge-danger">12</span>
                                </span>
                            </p> -->
                        </div>
                    </a>
                    @endif
                    @endforeach
                    @else
                    <a href="{{url('instructor/chat/user/'.$chat->id)}}" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md avatar-busy">
                                <img class="media-object rounded-circle"
                                    src="https://bootdey.com/img/Content/avatar/avatar1.png"
                                    alt="Generic placeholder image">
                                <i></i>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">@foreach ($chat->users as $user)
                                {{ $user->first_name }}@if (!$loop->last), @endif
                                @endforeach
                                <!-- <span class="font-small-3 float-right info">9:04 PM</span> -->
                            </h6>
                            <!-- <p class="list-group-item-text text-muted mb-0"><i
                                    class="ft-check primary font-small-2"></i> Thank you
                                <span class="float-right primary">
                                    <span class="badge badge-pill badge-danger">12</span>
                                </span>
                            </p> -->
                        </div>
                    </a>
                    @endif
                    @endforeach
                    <!-- <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md avatar-away">
                                <img class="media-object rounded-circle"
                                    src="../../../app-assets/images/portrait/small/avatar-s-8.png"
                                    alt="Generic placeholder image">
                                <i></i>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Sarah Woods
                                <span class="font-small-3 float-right info">2:14 AM</span>
                            </h6>
                            <p class="list-group-item-text text-muted mb-0"><i class="ft-check font-small-2"></i> Hello
                                krish!
                                <span class="float-right primary"><i
                                        class="font-medium-1 icon-volume-off blue-grey lighten-3 mr-1"></i>
                                    <span class="badge badge-pill badge-danger">3</span>
                                </span>
                            </p>
                        </div>
                    </a> -->


                </div>
            </div>
        </div>
    </div>
</div>
<div class="content-right">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body" style="background-color: #fff;">

            @if($chat_id)
            <section class="chat-app-window">
                <div class="chats">
                    <livewire:chat-instructor-messages :chatId="$chat_id" />
                </div>
            </section>
            <livewire:chat-instructor-form :chatId="$chat_id" />
            @else
            <section class="chat-app-window">
                مرحبا، يمكنم التواصل مع المدربين للاستفسار عن اي شئ في المحاضرة
            </section>

            @endif



        </div>
    </div>
</div>
@livewireScripts
@endsection