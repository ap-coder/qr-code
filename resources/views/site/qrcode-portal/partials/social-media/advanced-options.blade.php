<div class="form-container">
    <div class="section-header section-open not-formly">
        <div class="row form-title-row">
            <div class="col-md-1 box-icon hidden-sm">
                <div class="round-no text-center mt10" style="margin-top: 24px !important;">
                    <i class="fas fa-cog"></i>
                </div>
            </div>
            <div class="col-sm-12 col-md-11 box-title">
                <h3>Advanced Options</h3>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="section_type_container section_information">
            <div class="row form-input-row formly-field">
               
                <div class="row col-md-12 mb-10">
                    <div class="col-sm-12 col-md-3 box-label">
                        Sharing:
                    </div>
                    <div class="col-sm-12 col-md-9 box-input mt-16">
                        <label for="share_button">
                            <input type="checkbox" id="share_button" checked name="is_sharing" value="1" /> Add a share button to the page
                        </label>
                    </div>

                </div>

            </div>
        </div>


    </div>
</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img id="cropimage" src="">
                        </div>
                        <div class="col-md-4">
                            <div class="croppreview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="crop">Confirm</button>
            </div>
        </div>
    </div>
</div>
