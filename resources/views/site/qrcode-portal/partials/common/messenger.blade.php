<div class="row col-md-12 mb-10 channels-container messenger-container">
    
    <div class="col-sm-12 col-md-4 box-label">
        Messenger:
        <span class="ml-10">
            <div class="channel-bgd-messenger">
                <i class="fab fa-facebook-messenger"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon9">
                URL *
            </span>
            <input type="text" class="form-control" placeholder="m.me/username" required="required"
                id="channelInput-9" name="channelInput-9">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon9">Text</span>
            <input type="text" class="form-control" placeholder="Get in touch" value="Get in touch"
                id="qr_media_channels_channels_9" name="qr_media_channels_channels_9">
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>