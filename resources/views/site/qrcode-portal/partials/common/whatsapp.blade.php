<div class="row col-md-12 mb-10 channels-container whatsapp-container" random="{{ $rand ?? 0 }}">
    
    <div class="col-sm-12 col-md-4 box-label">
        <span>WhatsApp</span>:
        <span class="ml-10">
            <div class="channel-bgd-whatsapp">
                <i class="fab fa-whatsapp"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon5">
                Phone *
            </span>
            <input type="text" class="form-control" placeholder="+12025550141" required="required"
                id="channelInput-5" name="channelInput-5">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon5">Text</span>
            <input type="text" class="form-control" placeholder="Message us" value="Message us"
                id="qr_media_channels_channels_5" name="qr_media_channels_channels_5">

                <span class="btn-help-icon input-group__tooltip-icon" title="" rel="tooltip" data-trigger="hover" data-placement="top" data-original-title="Use a complete international phone number format. Please, do not use leading zeroes, brackets, or dashes."></span>
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>