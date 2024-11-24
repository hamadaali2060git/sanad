<div>
    <!-- style="position: fixed;bottom: 0;width: 57%;" -->
    <section class="chat-app-form">
        <div class="chat-app-input d-flex">

            <fieldset class="form-group position-relative has-icon-left col-10 m-0">
                <div class="form-control-position">
                    <i class="icon-emoticon-smile"></i>
                </div>
                <input type="text" wire:model="message" wire:keydown.enter.prevent="sendMessage" class="form-control"
                    id="iconLeft4" placeholder="اكتب رسالتك">
                <!-- <div class="form-control-position control-position-right">
                                    <i class="ft-image"></i>
                                </div> -->
            </fieldset>
            <fieldset class="form-group position-relative has-icon-left col-2 m-0">
                <button type="button" wire:click="sendMessage" class="btn btn-info"><i
                        class="la la-paper-plane-o d-lg-none"></i>
                    <span class="d-none d-lg-block">ارسال</span>
                </button>
            </fieldset>
        </div>
    </section>
</div>