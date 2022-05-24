<div class="row col-md-12 mb-10 channels-container reddit-container" random="{{ $rand ?? 0 }}">
    
    <div class="col-sm-12 col-md-4 box-label">
        <span>Reddit</span>:
        <span class="ml-10">
            <div class="channel-bgd-reddit">
                <i class="fab fa-reddit"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <input type="hidden" name="icon_class[]" value="fab fa-reddit">
        <input type="hidden" name="social_name[]" value="Reddit">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon21">
                URL *
            </span>
            <input type="url" class="form-control" placeholder="www.reddit.com/username" required="required"
                id="channelInput-21" name="url[]">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon21">Text</span>
            <input type="text" class="form-control channelText" placeholder="Comment on my latest post" id="qr_media_channels_channels_21" name="channel_label[]">
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>