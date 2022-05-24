<div class="row col-md-12 mb-10 channels-container twitter-container" random="{{ $rand ?? 0 }}">
    
    <div class="col-sm-12 col-md-4 box-label">
        <span>Twitter</span>:
        <span class="ml-10">
            <div class="channel-bgd-twitter">
                <i class="fab fa-twitter"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <input type="hidden" name="icon_class[]" value="fab fa-twitter">
        <input type="hidden" name="social_name[]" value="Twitter">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon3">
                @ *
            </span>
            <input type="text" class="form-control" placeholder="Username" required="required"
                id="channelInput-3" name="url[]">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon3">Text</span>
            <input type="text" class="form-control channelText" placeholder="Follow us"
                id="qr_media_channels_channels_3" name="channel_label[]">
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>