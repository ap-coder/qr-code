<div class="row col-md-12 mb-10 channels-container youtube-container" random="{{ $rand ?? 3 }}">
    
    <div class="col-sm-12 col-md-4 box-label">
        <span>YouTube</span>:
        <span class="ml-10">
            <div class="channel-bgd-youtube">
                <i class="fab fa-youtube"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon2">
                URL *
            </span>
            <input type="text" class="form-control" placeholder="www.youtube.com/user/mychannel" required="required"
                id="channelInput-2" name="channelInput-2">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon2">Text</span>
            <input type="text" class="form-control" placeholder="Subscribe to our channel" value="Watch our videos"
                id="qr_media_channels_channels_2" name="qr_media_channels_channels_2">
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>