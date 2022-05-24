<div class="row col-md-12 mb-10 channels-container telegram-container" random="{{ $rand ?? 0 }}">
    
    <div class="col-sm-12 col-md-4 box-label">
        <span>Telegram</span>:
        <span class="ml-10">
            <div class="channel-bgd-telegram">
                <i class="fab fa-telegram"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <input type="hidden" name="icon_class[]" value="fab fa-telegram">
        <input type="hidden" name="social_name[]" value="Telegram">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon8">
                URL *
            </span>
            <input type="url" class="form-control" placeholder="t.me/username" required="required"
                id="channelInput-8" name="url[]">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon8">Text</span>
            <input type="text" class="form-control channelText" placeholder="Get in touch" value="Get in touch"
                id="qr_media_channels_channels_8" name="channel_label[]">
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>