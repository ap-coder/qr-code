<div class="row" type="2" id="stepform2" style="display: none;">
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
            
        
            @include('site.qrcode-portal.partials.social-media.design-customizations')    
            @include('site.qrcode-portal.partials.social-media.basic-information')    
            @include('site.qrcode-portal.partials.social-media.social-media-channels')    
            @include('site.qrcode-portal.partials.social-media.welcome-screen')    
            @include('site.qrcode-portal.partials.social-media.advanced-options')    

        </form>
    </div>

    <div class="col-md-4 state-generator-data">
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn previewtab active">Preview</button>
            <button type="button" class="btn qrcodetab">QR Code</button>
        </div>
        <div class="preview-smartphone clearfix active mockup__smartphone">
            <div class="preview-smartphone-wrapper mockup__smartphone-wrapper social-media-preview" style="display: block;">
                <div id="smartphonePlaceholder" class="placeholder ratchet">
                    <div class="template template-url">
                        <iframe src="{{ route('qrcode.social-media-preview') }}" frameborder="0"></iframe>
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
