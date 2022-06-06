<div class="row" type="4" id="stepform4" style="display: none;">
    <div class="col-md-8">
        <form action="" id="vCardPlusForm">
            @csrf
            <div class="section-title">
                <div class="section-title__icon">
                    <i class="icon--title-editing fas fa-id-card"></i>
                </div>
                <div class="section-title__name">
                    <input type="text" name="qr_name" id="vcard_qr_name" class="input--title-editing"
                        placeholder="My Social Media QR Code">
                    <label class="section-title__label" for="vcard_qr_name">Name your QR Code</label>
                    <span class="btn-help-icon section-title__icon_tooltip" rel="tooltip" data-trigger="hover"
                        data-placement="left"
                        data-original-title="Names help you to stay organized and will only appear in your account and are not displayed to customers who scan your QR Codes."></span>
                </div>
            </div>
            
        
            @include('site.qrcode-portal.partials.vcard-plus.design-customizations')     
            @include('site.qrcode-portal.partials.vcard-plus.your-informations')     
            @include('site.qrcode-portal.partials.vcard-plus.social-media-channels')     
            @include('site.qrcode-portal.partials.vcard-plus.welcome-screen')     
            @include('site.qrcode-portal.partials.vcard-plus.advanced-options')

            <input type="hidden" name="vcardId" id="vcardId">
            <input type="hidden" name="vCardTab" id="vCardTab">
        </form>
    </div>

    <div class="col-md-4 state-generator-data">
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn vcardpreviewtab active">Preview</button>
            <button type="button" class="btn vcardqrcodetab">QR Code</button>
        </div>
        <div class="preview-smartphone clearfix active mockup__smartphone">
            <div class="preview-smartphone-wrapper vcard-preview-smartphone-wrapper mockup__smartphone-wrapper vcard-preview" style="display: block;">
                <div id="smartphonePlaceholder" class="placeholder ratchet">
                    <div class="template template-url">
                        <iframe src="{{ route('qrcode.vcard-preview') }}" frameborder="0"></iframe>
                    </div>
                </div>
            </div>

            <div class="preview-qrcode vcard-preview-qrcode" style="display: none;">
                <div class="code">

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
