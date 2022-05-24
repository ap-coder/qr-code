<div class="row col-md-12 mb-10 channels-container github-container" random="{{ $rand ?? 0 }}">
    
    <div class="col-sm-12 col-md-4 box-label">
        <span>Github</span>:
        <span class="ml-10">
            <div class="channel-bgd-github">
                <i class="fab fa-github"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <input type="hidden" name="icon_class[]" value="fab fa-github">
        <input type="hidden" name="social_name[]" value="Github">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon23">
                URL *
            </span>
            <input type="url" class="form-control" placeholder="www.github.com/username" required="required"
                id="channelInput-23" name="url[]">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon23">Text</span>
            <input type="text" class="form-control channelText" placeholder="Follow us" id="qr_media_channels_channels_23" name="channel_label[]">
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>