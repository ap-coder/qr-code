<div class="row col-md-12 mb-10 channels-container vkontakte-container" random="{{ $rand ?? 0 }}">
    
    <div class="col-sm-12 col-md-4 box-label">
        <span>VKontakte</span>:
        <span class="ml-10">
            <div class="channel-bgd-vkontakte">
                <i class="fab fa-vk"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <input type="hidden" name="icon_class[]" value="fab fa-vk">
        <input type="hidden" name="social_name[]" value="VKontakte">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon18">
                URL *
            </span>
            <input type="url" class="form-control" placeholder="www.vk.com/name" required="required"
                id="channelInput-18" name="url[]">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon18">Text</span>
            <input type="text" class="form-control channelText" placeholder="Follow us" id="qr_media_channels_channels_18" name="channel_label[]">
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>