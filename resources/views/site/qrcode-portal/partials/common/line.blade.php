<div class="row col-md-12 mb-10 channels-container line-container" random="{{ $rand ?? 0 }}">
    
    <div class="col-sm-12 col-md-4 box-label">
        <span>Line</span>:
        <span class="ml-10">
            <div class="channel-bgd-line">
                <i class="fab fa-line"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <input type="hidden" name="icon_class[]" value="fab fa-line">
        <input type="hidden" name="social_name[]" value="Line">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon20">
                ID *
            </span>
            <input type="text" class="form-control" placeholder="User ID" required="required"
                id="channelInput-20" name="url[]">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon20">Text</span>
            <input type="text" class="form-control channelText" placeholder="Add me" id="qr_media_channels_channels_20" name="channel_label[]">
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>