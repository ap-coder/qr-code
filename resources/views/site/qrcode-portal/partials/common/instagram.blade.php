<div class="row col-md-12 mb-10 channels-container instagram-container" random="{{ $rand ?? 0 }}">
    
    <div class="col-sm-12 col-md-4 box-label">
        <span>Instagram</span>:
        <span class="ml-10">
            <div class="channel-bgd-instagram">
                <i class="fab fa-instagram"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addoninsta">
                @ *
            </span>
            <input type="text" class="form-control" placeholder="Username" required="required"
                id="channelInput-insta" name="channelInput-insta">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addoninsta">Text</span>
            <input type="text" class="form-control" placeholder="Follow us"
                id="qr_media_channels_channels_insta" name="qr_media_channels_channels_insta">
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>