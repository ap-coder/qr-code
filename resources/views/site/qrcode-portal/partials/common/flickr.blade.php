<div class="row col-md-12 mb-10 channels-container flickr-container"  random="{{ $rand ?? 0 }}">
    
    <div class="col-sm-12 col-md-4 box-label">
        <span>Flickr</span>:
        <span class="ml-10">
            <div class="channel-bgd-flickr">
                <i class="fab fa-flickr"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <input type="hidden" name="icon_class[]" value="fab fa-flickr">
        <input type="hidden" name="social_name[]" value="Flickr">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon15">
                URL *
            </span>
            <input type="url" class="form-control" placeholder="www.flickr.com/photos/flickr" required="required"
                id="channelInput-15" name="url[]">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon15">Text</span>
            <input type="text" class="form-control channelText" placeholder="Follow us" id="qr_media_channels_channels_15" name="channel_label[]">
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>