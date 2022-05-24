<div class="row col-md-12 mb-10 channels-container pinterest-container" random="{{ $rand ?? 0 }}">
    
    <div class="col-sm-12 col-md-4 box-label">
        <span>Pinterest</span>:
        <span class="ml-10">
            <div class="channel-bgd-pinterest">
                <i class="fab fa-pinterest"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <input type="hidden" name="icon_class[]" value="fab fa-pinterest">
        <input type="hidden" name="social_name[]" value="Pinterest">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon12">
                URL *
            </span>
            <input type="url" class="form-control" placeholder="www.pinterest.com/username" required="required"
                id="channelInput-12" name="url[]">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon12">Text</span>
            <input type="text" class="form-control channelText" placeholder="Follow us" id="qr_media_channels_channels_12" name="channel_label[]">
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>