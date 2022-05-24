<div class="row col-md-12 mb-10 channels-container dribbble-container"  random="{{ $rand ?? 0 }}">
    
    <div class="col-sm-12 col-md-4 box-label">
        <span>Dribbble</span>:
        <span class="ml-10">
            <div class="channel-bgd-dribbble">
                <i class="fab fa-dribbble"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <input type="hidden" name="icon_class[]" value="fab fa-dribbble">
        <input type="hidden" name="social_name[]" value="Dribbble">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon17">
                URL *
            </span>
            <input type="url" class="form-control" placeholder="www.dribbble.com/company" required="required"
                id="channelInput-17" name="url[]">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon17">Text</span>
            <input type="text" class="form-control channelText" placeholder="View my portfolio" id="qr_media_channels_channels_17" name="channel_label[]">
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>