<div wire:poll.keep-alive.1s>
    <?php $user = Auth::guard('instructors')->user(); ?>
    @foreach($messages as $msg)
    <div class="chat {{ $msg->instructor_id != $user->id ?  'chat-left' : ''}}">
        <div class="chat-avatar">
            <a class="avatar" data-toggle="tooltip" href="#" data-placement="left" title="" data-original-title="">
                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar" />
            </a>
        </div>
        <div class="chat-body">
            <div class="chat-content">
                <p>{{ $msg->message }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>