<div class="row" type="2" id="stepform2">
    <div class="col-md-8">
        <form action="">
            <div class="section-title">
                <div class="section-title__icon">
                    <i class="icon--title-editing fas fa-bullhorn"></i>
                </div>
                <div class="section-title__name">
                    <input type="text" name="qrcode_title" id="qrcode_title_2" class="input--title-editing"
                        placeholder="My Social Media QR Code">
                    <label class="section-title__label" for="qrcode_title_2">Name your QR Code</label>
                    <span class="btn-help-icon section-title__icon_tooltip" rel="tooltip" data-trigger="hover"
                        data-placement="left"
                        data-original-title="Names help you to stay organized and will only appear in your account and are not displayed to customers who scan your QR Codes."></span>
                </div>
            </div>
            
        
            @include('frontend.qrcode-portal.partials.social-media.design-customizations')    
            @include('frontend.qrcode-portal.partials.social-media.basic-information')    
            @include('frontend.qrcode-portal.partials.social-media.social-media-channels')    

        </form>
    </div>

    <div class="col-md-4 state-generator-data">
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn previewtab active">Preview</button>
            <button type="button" class="btn qrcodetab">QR Code</button>
        </div>
        <div class="preview-smartphone clearfix active mockup__smartphone">
            <div class="preview-smartphone-wrapper noVideo mockup__smartphone-wrapper" style="display: block;">
                <div id="smartphonePlaceholder" class="placeholder ratchet">
                    <div class="template template-url">
                        <header class="bar bar-nav">
                            <div class="pure-g">
                                <div class="browser-input pure-u-5-6"></div>
                                <div class="browser-refresh pure-u-1-6">
                                </div>
                            </div>
                        </header>

                        <div class="text-center content template_url" style="padding-top:200px;background-image:none;">
                            <div class="arrow_box">
                                <span>Some QR Codes types will show a live preview here but not this one. View and test
                                    your
                                    QR Code in the next step!</span>
                            </div>
                            <img src="{{ asset('site/img/CodyE_PointingLeft.svg') }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="preview-qrcode" style="display: none;">
                <div class="code">

                    <img id="barcodeImage" src="">

                    <div class="mockup__qrcode-error">
                        <div class="mockup__qrcode-error-content">
                            <i class="fas fa-info-circle"></i>
                            <h4>Fill in the required fields in the form to preview your QR Code</h4>
                        </div>
                    </div>
                </div>
                <h3>Scan this QR Code to preview</h3>
                <p>You can customize the design of your <br> QR Code in the next step.</p>
            </div>

        </div>
    </div>
</div>
