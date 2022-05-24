<div class="row col-md-12 mb-10 channels-container xing-container" random="{{ $rand ?? 0 }}">
    
    <div class="col-sm-12 col-md-4 box-label">
        <span>Xing</span>:
        <span class="ml-10">
            <div class="channel-bgd-xing">
                <i class="fab fa-xing"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <input type="hidden" name="icon_class[]" value="fab fa-xing">
        <input type="hidden" name="social_name[]" value="Xing">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon14">
                URL *
            </span>
            <input type="url" class="form-control" placeholder="www.xing.com/company/name" required="required"
                id="channelInput-14" name="url[]">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon14">Text</span>
            <input type="text" class="form-control channelText" placeholder="Join my network" id="qr_media_channels_channels_14" name="channel_label[]">
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>