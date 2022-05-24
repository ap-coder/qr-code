<div class="row col-md-12 mb-10 channels-container spotify-container" random="{{ $rand ?? 0 }}">
    
    <div class="col-sm-12 col-md-4 box-label">
        <span>Spotify</span>:
        <span class="ml-10">
            <div class="channel-bgd-spotify">
                <i class="fab fa-spotify"></i>
            </div>
        </span>
    </div>

    <div class="col-sm-12 col-md-8 channel-input-container">
        <input type="hidden" name="icon_class[]" value="fab fa-spotify">
        <input type="hidden" name="social_name[]" value="Spotify">
        <div class="input-group">
            <span class="input-group-addon" id="prefix-addon25">
                URL *
            </span>
            <input type="url" class="form-control" placeholder="https://open.spotify.com/user/..." required="required"
                id="channelInput-25" name="url[]">

                <span class="btn-help-icon input-group__tooltip-icon" title="" rel="tooltip" data-trigger="hover" data-placement="top" data-original-title="You can find this link in your Spotify profile by clicking on the “three dots” menu"></span>
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="label-addon25">Text</span>
            <input type="text" class="form-control channelText" placeholder="Listen to us on Spotify" value="Listen to us on Spotify" id="qr_media_channels_channels_25" name="channel_label[]">
            
        </div>
    </div>
    @include('site.qrcode-portal.partials.common.right-icons')
</div>