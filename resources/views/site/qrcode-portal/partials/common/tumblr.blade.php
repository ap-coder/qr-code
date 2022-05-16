<div class="row col-md-12 mb-10 channels-container tumblr-container">
    
    <div class="col-sm-12 col-md-4 box-label">
        Tumblr:
        <span class="ml-10">
            <div class="channel-bgd-tumblr">
                <i class="fab fa-tumblr"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon22">
                URL *
            </span>
            <input type="text" class="form-control" placeholder="https://username.tumblr.com/" required="required"
                id="channelInput-22" name="channelInput-22">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon22">Text</span>
            <input type="text" class="form-control" placeholder="Follow us" id="qr_media_channels_channels_22" name="qr_media_channels_channels_22">
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>