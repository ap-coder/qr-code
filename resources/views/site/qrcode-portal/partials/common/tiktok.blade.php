<div class="row col-md-12 mb-10 channels-container tiktok-container" random="{{ $rand ?? 0 }}">
    
    <div class="col-sm-12 col-md-4 box-label">
        <span>TikTok</span>:
        <span class="ml-10">
            <div class="channel-bgd-tiktok">
                <i class="fab fa-tiktok"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <input type="hidden" name="icon_class[]" value="fab fa-tiktok">
        <input type="hidden" name="social_name[]" value="TikTok">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon6">
                URL *
            </span>
            <input type="url" class="form-control" placeholder="www.tiktok.com/@username" required="required"
                id="channelInput-6" name="url[]">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon6">Text</span>
            <input type="text" class="form-control channelText" placeholder="Find us on TikTok" value="Find us on TikTok"
                id="qr_media_channels_channels_6" name="channel_label[]">
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>