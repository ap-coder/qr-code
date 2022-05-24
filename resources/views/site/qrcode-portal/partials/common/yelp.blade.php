<div class="row col-md-12 mb-10 channels-container yelp-container" random="{{ $rand ?? 0 }}">
    
    <div class="col-sm-12 col-md-4 box-label">
        <span>Yelp</span>:
        <span class="ml-10">
            <div class="channel-bgd-yelp">
                <i class="fab fa-yelp"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <input type="hidden" name="icon_class[]" value="fab fa-yelp">
        <input type="hidden" name="social_name[]" value="Yelp">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon10">
                URL *
            </span>
            <input type="url" class="form-control" placeholder="www.yelp.com/biz/..." required="required"
                id="channelInput-10" name="url[]">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon10">Text</span>
            <input type="text" class="form-control channelText" placeholder="Review us" value="Review us"
                id="qr_media_channels_channels_10" name="channel_label[]">
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>