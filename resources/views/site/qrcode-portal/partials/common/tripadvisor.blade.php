<div class="row col-md-12 mb-10 channels-container tripadvisor-container" random="{{ $rand ?? 0 }}">
    
    <div class="col-sm-12 col-md-4 box-label">
        <span>Tripadvisor</span>:
        <span class="ml-10">
            <div class="channel-bgd-tripadvisor">
                <i class="fab fa-tripadvisor"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <input type="hidden" name="icon_class[]" value="fab fa-tripadvisor">
        <input type="hidden" name="social_name[]" value="Tripadvisor">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon19">
                URL *
            </span>
            <input type="url" class="form-control" placeholder="www.tripadvisor.com/name" required="required"
                id="channelInput-19" name="url[]">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon19">Text</span>
            <input type="text" class="form-control channelText" placeholder="Review us" id="qr_media_channels_channels_19" name="channel_label[]">
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>
