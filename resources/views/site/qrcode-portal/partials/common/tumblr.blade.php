<div class="row col-md-12 mb-10 channels-container tumblr-container" random="{{ $rand ?? 0 }}">
    
    <div class="col-sm-12 col-md-4 box-label">
        <span>Tumblr</span>:
        <span class="ml-10">
            <div class="channel-bgd-tumblr">
                <i class="fab fa-tumblr"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <input type="hidden" name="icon_class[]" value="fab fa-tumblr">
        <input type="hidden" name="social_name[]" value="Tumblr">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon22">
                URL *
            </span>
            <input type="url" class="form-control" placeholder="https://username.tumblr.com/" required="required"
                id="channelInput-22" name="url[]">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon22">Text</span>
            <input type="text" class="form-control channelText" placeholder="Follow us" id="qr_media_channels_channels_22" name="channel_label[]">
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>