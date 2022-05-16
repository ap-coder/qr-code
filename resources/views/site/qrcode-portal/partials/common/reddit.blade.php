<div class="row col-md-12 mb-10 channels-container reddit-container">
    
    <div class="col-sm-12 col-md-4 box-label">
        Reddit:
        <span class="ml-10">
            <div class="channel-bgd-reddit">
                <i class="fab fa-reddit"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon21">
                URL *
            </span>
            <input type="text" class="form-control" placeholder="www.reddit.com/username" required="required"
                id="channelInput-21" name="channelInput-21">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon21">Text</span>
            <input type="text" class="form-control" placeholder="Comment on my latest post" id="qr_media_channels_channels_21" name="qr_media_channels_channels_21">
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>