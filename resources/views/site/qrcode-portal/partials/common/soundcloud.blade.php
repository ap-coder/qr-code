<div class="row col-md-12 mb-10 channels-container soundcloud-container" random="{{ $rand ?? 0 }}">
    
    <div class="col-sm-12 col-md-4 box-label">
        <span>SoundCloud</span>:
        <span class="ml-10">
            <div class="channel-bgd-soundcloud">
                <i class="fab fa-soundcloud"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <input type="hidden" name="icon_class[]" value="fab fa-soundcloud">
        <input type="hidden" name="social_name[]" value="SoundCloud">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon26">
                URL *
            </span>
            <input type="url" class="form-control" placeholder="https://soundcloud.com/username" required="required"
                id="channelInput-26" name="title[]">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon26">Text</span>
            <input type="text" class="form-control channelText" placeholder="Listen to us on SoundCloud" value="Listen to us on SoundCloud" id="qr_media_channels_channels_26" name="channel_label[]">
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>