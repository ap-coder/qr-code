<div class="row col-md-12 mb-10 channels-container google-container" random="{{ $rand ?? 0 }}">
    
    <div class="col-sm-12 col-md-4 box-label">
        <span>Google Review</span>:
        <span class="ml-10">
            <div class="channel-bgd-googlereview">
                <i class="fab fa-google"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon11">
                URL *
            </span>
            <input type="text" class="form-control" placeholder="https://g.page/shortname/review" required="required"
                id="channelInput-11" name="channelInput-11">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon11">Text</span>
            <input type="text" class="form-control" placeholder="Review us on Google" value="Review us on Google" id="qr_media_channels_channels_11" name="qr_media_channels_channels_11">
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>