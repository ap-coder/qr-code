<div class="row col-md-12 mb-10 channels-container website-container"  random="{{ $rand ?? 1 }}">

    <div class="col-sm-12 col-md-4 box-label">
        Website:
        <span class="ml-10">
            <div class="channel-bgd-website">
                <i class="fas fa-globe"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon0">
                URL *
            </span>
            <input type="text" class="form-control" placeholder="www.mywebsite.com" required="required"
                id="channelInput-0" name="channelInput-0">
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon0">Text</span>
            <input type="text" class="form-control" placeholder="Visit our website" value="Visit our website"
                id="qr_media_channels_channels_0" name="qr_media_channels_channels_0">
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>