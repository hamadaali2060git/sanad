<div wire:poll.keep-alive.1s>

    <div class="chat-header clearfix">
        <div class="row">
            <div class="col-lg-6">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                </a>
                <div class="chat-about">
                    <p>{{$instructor->first_name .' ' .$instructor->last_name}}</p>
                    <!-- <small>Last seen: 2 hours ago</small> -->
                </div>
            </div>
            <!-- <div class="col-lg-6 hidden-sm text-right">
                                        <a href="javascript:void(0);" class="btn btn-outline-secondary"><i
                                                class="fa fa-camera"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-outline-primary"><i
                                                class="fa fa-image"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-outline-info"><i
                                                class="fa fa-cogs"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-outline-warning"><i
                                                class="fa fa-question"></i></a>
                                    </div> -->
        </div>
    </div>
    <!-- border: 1px solid #ccc; -->
    <div class="chat-history" style="height: 500px; overflow-y: scroll; ">
        <ul class="m-b-0">
            <?php $user = Auth::guard('instructors')->user(); ?>
            @foreach($messages as $msg)
            <li class="clearfix">
                <!-- <div class="message-data text-right">
                    <span class="message-data-time">10:10 AM, Today</span>
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                </div> -->
                <div
                    class="message  {{ $msg->instructor_id != $user->id ?  'other-message float-right' : 'my-message'}}  ">
                    {{ $msg->message }} </div>
            </li>
            @endforeach

            <!-- <li class="clearfix">
                <div class="message-data text-right">
                    <span class="message-data-time">10:10 AM, Today</span>
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">
                </div>
                <div class="message other-message float-right"> Hi Aiden </div>
            </li>
            <li class="clearfix">
                <div class="message-data">
                    <span class="message-data-time">10:12 AM, Today</span>
                </div>
                <div class="message my-message">Are we meeting today?</div>
            </li>
            <li class="clearfix">
                <div class="message-data">
                    <span class="message-data-time">10:15 AM, Today</span>
                </div>
                <div class="message my-message">Project has been already
                    finished and I have results to
                    show you.</div>
            </li> -->
        </ul>
    </div>
    <form>

        <div class="chat-message clearfix">
            <div class="input-group mb-0">
                <div class="input-group-prepend">
                    <button type="button" wire:click="sendMessage" class="input-group-text"><i
                            class="fa fa-send">ارسال</i></button>
                    <!-- <span class="input-group-text"><i class="fa fa-send">ارسال</i></span> -->
                </div>
                <input type="text" wire:model="message" wire:keydown.enter.prevent="sendMessage"
                    placeholder="اكتب رسالتك ..." class="form-control input-group"
                    style="text-align: right;border: 1px solid #ced4da;direction: rtl;">
            </div>
        </div>
    </form>
    <!-- 
    <div class="mt-3">
        <input type="text" wire:model="message" wire:keydown.enter="sendMessage" placeholder="اكتب رسالتك..."
            class="form-control" />
    </div> -->
</div>