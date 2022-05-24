<div class="row col-md-12 mb-10 channels-container snapchat-container" random="{{ $rand ?? 0 }}">
    
    <div class="col-sm-12 col-md-4 box-label">
        <span>Snapchat</span>:
        <span class="ml-10">
            <div class="channel-bgd-snapchat">
                <i class="fab fa-snapchat"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <input type="hidden" name="icon_class[]" value="fab fa-snapchat">
        <input type="hidden" name="social_name[]" value="Snapchat">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon7">
                ID *
            </span>
            <input type="text" class="form-control" placeholder="Username" required="required"
                id="channelInput-7" name="url[]">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon7">Text</span>
            <input type="text" class="form-control channelText" placeholder="View My Story"
                id="qr_media_channels_channels_7" name="channel_label[]">
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>