<div class="row col-md-12 mb-10 channels-container facebook-container">
    
    <div class="col-sm-12 col-md-4 box-label">
        Facebook:
        <span class="ml-10">
            <div class="channel-bgd-facebook">
                <i class="fab fa-facebook"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon1">
                URL *
            </span>
            <input type="text" class="form-control" placeholder="www.facebook.com/page" required="required"
                id="channelInput-1" name="channelInput-1">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon1">Text</span>
            <input type="text" class="form-control" placeholder="Like our page" value="Become a fan"
                id="qr_media_channels_channels_1" name="qr_media_channels_channels_1">
        </div>
    </div>
    
    @include('frontend.qrcode-portal.partials.common.right-icons')

</div>