<div class="row col-md-12 mb-10 channels-container skype-container">
    
    <div class="col-sm-12 col-md-4 box-label">
        Skype:
        <span class="ml-10">
            <div class="channel-bgd-skype">
                <i class="fab fa-skype"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon24">
                SkypeID *
            </span>
            <input type="text" class="form-control" placeholder="User ID" required="required"
                id="channelInput-24" name="channelInput-24">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon24">Text</span>
            <input type="text" class="form-control" placeholder="Add me" id="qr_media_channels_channels_24" name="qr_media_channels_channels_24">
        </div>
    </div>
    @include('frontend.qrcode-portal.partials.common.right-icons')
</div>