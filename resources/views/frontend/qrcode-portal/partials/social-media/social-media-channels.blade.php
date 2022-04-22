<div class="form-container">
    <div class="section-header section-open not-formly">
        <div class="row form-title-row">
            <div class="col-md-1 box-icon hidden-sm">
                <div class="round-no text-center mt10" style="margin-top: 24px !important;">
                    <i class="fas fa-bullhorn"></i>
                </div>
            </div>
            <div class="col-sm-12 col-md-11 box-title">
                <h3>Social Media Channels</h3>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="section_type_container section_information">
            <div class="row form-input-row formly-field">
                <div class="col-lg-offset-1 col-sm-12 col-lg-11 mb-10">
                    <p class="section-subheadline">Add your username or links to social media pages below. Delete a channel or use the arrows to rearrange the order of the links as they appear.</p>
                </div>

                <div class="row col-md-12 mb-10 channels-container">
                    <div class="col-sm-12 col-md-3 box-label">
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
                            <input type="text" class="form-control" placeholder="www.mywebsite.com" required="required" id="channelInput-0" name="channelInput-0">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" id="label-addon0">Text</span>
                            <input type="text" class="form-control" placeholder="Visit our website" id="formly__qr_media_channels_channels_0" name="formly__qr_media_channels_channels_0">
                        </div>
                    </div>

                    @include('frontend.qrcode-portal.partials.social-icons')

                </div>
                
            </div>
        </div>
        

    </div>
</div>