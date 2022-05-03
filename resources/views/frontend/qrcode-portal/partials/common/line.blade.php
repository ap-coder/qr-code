<div class="row col-md-12 mb-10 channels-container line-container">
    
    <div class="col-sm-12 col-md-4 box-label">
        Line:
        <span class="ml-10">
            <div class="channel-bgd-line">
                <i class="fab fa-line"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon20">
                ID *
            </span>
            <input type="text" class="form-control" placeholder="User ID" required="required"
                id="channelInput-20" name="channelInput-20">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon20">Text</span>
            <input type="text" class="form-control" placeholder="Add me" id="qr_media_channels_channels_20" name="qr_media_channels_channels_20">
        </div>
    </div>
    @include('frontend.qrcode-portal.partials.common.right-icons')
</div>