<div class="row" type="1" id="stepform1" style="display: none;">
    <div class="col-md-8">
        <form action="" id="websiteForm">
            @csrf
            <div class="section-title">
                <div class="section-title__icon">
                    <i class="icon--title-editing fas fa-link"></i>
                </div>
                <div class="section-title__name">
                    <input type="text" name="qr_name" id="website_qr_title" class="input--title-editing" placeholder="My Website QR Code" required>
                    <label class="section-title__label" for="website_qr_title">Name your QR Code</label>
                    <span class="btn-help-icon section-title__icon_tooltip" rel="tooltip" data-trigger="hover"
                        data-placement="left"
                        data-original-title="Names help you to stay organized and will only appear in your account and are not displayed to customers who scan your QR Codes."></span>
                </div>
            </div>
    
            <div class="form-container">
                <div class="section-header section-open not-formly">
                    <div class="row form-title-row">
                        <div class="col-md-1 box-icon hidden-sm">
                            <div class="round-no text-center mt10" style="margin-top: 20px !important;">
                                <i class="fas fa-edit"></i>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-11 box-title">
                            <h3>Enter your website address</h3>
                        </div>
                    </div>
                </div>
                <div class="section-body">
                    <div class="section_type_container section_information">
                        <div class="row form-input-row formly-field">
                            <div class="col-lg-offset-1 col-sm-12 col-lg-11 mb-10">
                                <p class="section-subheadline">Type in the website to link with your QR Code</p>
                            </div>
    
    
                            <div class="row col-md-12 mb-10">
                                <div class="col-sm-12 col-md-4 box-label">
                                    Website:
                                </div>
                                <div class="col-sm-12 col-md-8 box-input">
                                    <input required="required" spellcheck="false" placeholder="https://www.my-website.com" name="url" id="UrlBarcode_url" type="text" maxlength="1500">
                                </div>
                            </div>
    
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    <div class="col-md-4 state-generator-data">
        {{-- <div class="overflow_base"></div> --}}
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
                                <span>Some QR Codes types will show a live preview here but not this one. View and test your
                                    QR Code in the next step!</span>
                            </div>
                            <img src="{{ asset('site/img/CodyE_PointingLeft.svg') }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="preview-qrcode" style="display: none;">
                <div class="code">

                    {{-- <img id="barcodeImage" src=""> --}}
                    <div class="barcodeSVG"></div>

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