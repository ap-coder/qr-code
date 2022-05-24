<div class="row col-md-12 mb-10 channels-container facebook-container"  random="{{ $rand ?? 2 }}">
    
    <div class="col-sm-12 col-md-4 box-label">
        <span>Facebook</span>:
        <span class="ml-10">
            <div class="channel-bgd-facebook">
                <i class="fab fa-facebook"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <input type="hidden" name="icon_class[]" value="fab fa-facebook">
        <input type="hidden" name="social_name[]" value="Facebook">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon1">
                URL *
            </span>
            <input type="url" class="form-control" placeholder="www.facebook.com/page" required="required"
                id="channelInput-1" name="url[]">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon1">Text</span>
            <input type="text" class="form-control channelText" placeholder="Become a fan" value="Become a fan"
                id="qr_media_channels_channels_1" name="channel_label[]">
        </div>
    </div>
    
    @include('site.qrcode-portal.partials.common.right-icons')

</div>