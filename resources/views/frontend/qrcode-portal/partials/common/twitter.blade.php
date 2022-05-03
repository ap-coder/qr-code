<div class="row col-md-12 mb-10 channels-container twitter-container">
    
    <div class="col-sm-12 col-md-4 box-label">
        Twitter:
        <span class="ml-10">
            <div class="channel-bgd-twitter">
                <i class="fab fa-twitter"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon3">
                @ *
            </span>
            <input type="text" class="form-control" placeholder="Username" required="required"
                id="channelInput-3" name="channelInput-3">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon3">Text</span>
            <input type="text" class="form-control" placeholder="Follow us"
                id="qr_media_channels_channels_3" name="qr_media_channels_channels_3">
        </div>
    </div>
    @include('frontend.qrcode-portal.partials.common.right-icons')
</div>