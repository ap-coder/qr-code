<div class="row col-md-12 mb-10 channels-container telegram-container">
    
    <div class="col-sm-12 col-md-4 box-label">
        Telegram:
        <span class="ml-10">
            <div class="channel-bgd-telegram">
                <i class="fab fa-telegram"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon8">
                URL *
            </span>
            <input type="text" class="form-control" placeholder="t.me/username" required="required"
                id="channelInput-8" name="channelInput-8">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon8">Text</span>
            <input type="text" class="form-control" placeholder="Get in touch" value="Get in touch"
                id="qr_media_channels_channels_8" name="qr_media_channels_channels_8">
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>