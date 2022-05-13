<div class="row col-md-12 mb-10 channels-container flickr-container">
    
    <div class="col-sm-12 col-md-4 box-label">
        Flickr:
        <span class="ml-10">
            <div class="channel-bgd-flickr">
                <i class="fab fa-flickr"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon15">
                URL *
            </span>
            <input type="text" class="form-control" placeholder="www.flickr.com/photos/flickr" required="required"
                id="channelInput-15" name="channelInput-15">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon15">Text</span>
            <input type="text" class="form-control" placeholder="Follow us" id="qr_media_channels_channels_15" name="qr_media_channels_channels_15">
        </div>
    </div>
    @include('frontend.qrcode-portal.partials.common.right-icons')
</div>