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
                
                <div class="channel-row">
                    @include('frontend.qrcode-portal.partials.common.website')
                    @include('frontend.qrcode-portal.partials.common.facebook')
                    @include('frontend.qrcode-portal.partials.common.youtube')
                </div>

                @include('frontend.qrcode-portal.partials.common.social-icons')

                
            </div>
        </div>
        

    </div>
</div>