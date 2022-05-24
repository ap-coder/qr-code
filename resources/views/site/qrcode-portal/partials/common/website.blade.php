<div class="row col-md-12 mb-10 channels-container website-container"  random="{{ $rand ?? 1 }}" type="website">

    <div class="col-sm-12 col-md-4 box-label">
        <span>Website</span>:
        <span class="ml-10">
            <div class="channel-bgd-website">
                <i class="fas fa-globe"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <input type="hidden" name="icon_class[]" value="fas fa-globe">
        <input type="hidden" name="social_name[]" value="Website">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon0">
                URL *
            </span>
            <input type="url" class="form-control channelName" placeholder="www.mywebsite.com" required="required"
                id="channelInput-0" name="url[]">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon0">Text</span>
            <input type="text" class="form-control channelText" placeholder="Visit our website" value="Visit our website"
                id="qr_media_channels_channels_0" name="channel_label[]">
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>