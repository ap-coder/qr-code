<div class="row col-md-12 mb-10 channels-container vkontakte-container">
    
    <div class="col-sm-12 col-md-4 box-label">
        VKontakte:
        <span class="ml-10">
            <div class="channel-bgd-vkontakte">
                <i class="fab fa-vk"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon18">
                URL *
            </span>
            <input type="text" class="form-control" placeholder="www.vk.com/name" required="required"
                id="channelInput-18" name="channelInput-18">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon18">Text</span>
            <input type="text" class="form-control" placeholder="Follow us" id="qr_media_channels_channels_18" name="qr_media_channels_channels_18">
        </div>
    </div>
    @include('frontend.qrcode-portal.partials.common.right-icons')
</div>