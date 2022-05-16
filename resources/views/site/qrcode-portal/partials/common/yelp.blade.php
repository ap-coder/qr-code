<div class="row col-md-12 mb-10 channels-container yelp-container">
    
    <div class="col-sm-12 col-md-4 box-label">
        Yelp:
        <span class="ml-10">
            <div class="channel-bgd-yelp">
                <i class="fab fa-yelp"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon10">
                URL *
            </span>
            <input type="text" class="form-control" placeholder="www.yelp.com/biz/..." required="required"
                id="channelInput-10" name="channelInput-10">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon10">Text</span>
            <input type="text" class="form-control" placeholder="Review us" value="Review us"
                id="qr_media_channels_channels_10" name="qr_media_channels_channels_10">
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>