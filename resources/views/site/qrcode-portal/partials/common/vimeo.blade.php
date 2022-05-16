<div class="row col-md-12 mb-10 channels-container vimeo-container" random="{{ $rand ?? 0 }}">
    
    <div class="col-sm-12 col-md-4 box-label">
        <span>Vimeo</span>:
        <span class="ml-10">
            <div class="channel-bgd-vimeo">
                <i class="fab fa-vimeo"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon16">
                URL *
            </span>
            <input type="text" class="form-control" placeholder="www.vimeo.com/channels/mychannel" required="required"
                id="channelInput-16" name="channelInput-16">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon16">Text</span>
            <input type="text" class="form-control" placeholder="Follow us" id="qr_media_channels_channels_16" name="qr_media_channels_channels_16">
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>