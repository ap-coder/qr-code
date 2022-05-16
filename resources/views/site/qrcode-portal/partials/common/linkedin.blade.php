<div class="row col-md-12 mb-10 channels-container linkedin-container" random="{{ $rand ?? 0 }}">
    
    <div class="col-sm-12 col-md-4 box-label">
        <span>LinkedIn</span>:
        <span class="ml-10">
            <div class="channel-bgd-linkedin">
                <i class="fab fa-linkedin"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon13">
                URL *
            </span>
            <input type="text" class="form-control" placeholder="www.linkedin.com/company/name" required="required"
                id="channelInput-13" name="channelInput-13">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon13">Text</span>
            <input type="text" class="form-control" placeholder="Join my network" id="qr_media_channels_channels_13" name="qr_media_channels_channels_13">
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>