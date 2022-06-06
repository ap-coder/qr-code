<div class="form-container">
    <div class="section-header section-open not-formly">
        <div class="row form-title-row">
            <div class="col-md-1 box-icon hidden-sm">
                <div class="round-no text-center mt10" style="margin-top: 24px !important;">
                    <i class="fas fa-mobile"></i>
                </div>
            </div>
            <div class="col-sm-12 col-md-11 box-title">
                <h3>Welcome Screen</h3>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="section_type_container section_information">
            <div class="row form-input-row formly-field">
                <div class="col-lg-offset-1 col-sm-12 col-lg-11 mb-10">
                    <p class="section-subheadline">Display your logo while your page is loading.</p>
                </div>


                <div class="row col-md-12 mb-10">
                    <div class="col-sm-12 col-md-3 box-label">
                        Image: <span class="btn-help-icon visible-lg-inline-block" title="" rel="tooltip"
                            data-trigger="hover" data-placement="top"
                            data-original-title="Upload an image or logo from your computer. Images must be in .jpg or .png format."></span>
                    </div>
                    <div class="col-sm-12 col-md-6 box-input">
                        <div class="cardwelcomecroppreviewimage">
                            <img src="{{ asset('site/img/qr_code.jpg') }}">
                            {{-- <span class="fas fa-edit"></span> --}}
                        </div>
                        <img class="vcardwelcomeImage" src="{{ asset('site/img/welcome.png') }}">
                        <input type="file" id="vcard_welcome_image" style="display: none;" />
                    </div>
                    <div class="col-sm-12 col-md-3 box-input">
                       <button type="button" class="btn btn-danger changevcardwelcomeImage"> <i class="fa fa-sync"></i> Change</button>
                    </div>

                </div>

            </div>
        </div>


    </div>
</div>

<input type="hidden" name="vcardwelcomeLogo" id="vcardwelcomeLogo">

<div class="modal fade" id="vcard_welcome_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img id="vcardwelcomecropimage" src="">
                        </div>
                        <div class="col-md-4">
                            <div class="vcardwelcomecroppreview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="vcardwelcomecrop">Confirm</button>
            </div>
        </div>
    </div>
</div>
