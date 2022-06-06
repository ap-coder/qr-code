<div class="form-container">
    <div class="section-header section-open not-formly">
        <div class="row form-title-row">
            <div class="col-md-1 box-icon hidden-sm">
                <div class="round-no text-center mt10" style="margin-top: 24px !important;">
                    <i class="fas fa-info-circle"></i>
                </div>
            </div>
            <div class="col-sm-12 col-md-11 box-title">
                <h3>Your Information</h3>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="section_type_container section_information vcardInformations">
            <div class="row form-input-row formly-field">
                <div class="col-lg-offset-1 col-sm-12 col-lg-11 mb-10">
                    <p class="section-subheadline">Fill in your contact details. Not all fields are mandatory.</p>
                </div>


                <div class="row col-md-12 mb-10">
                    <div class="col-sm-12 col-md-3 box-label">
                        Image: <span class="btn-help-icon visible-lg-inline-block" title="" rel="tooltip"
                            data-trigger="hover" data-placement="top"
                            data-original-title="Select an image as your vCard profile picture. Upload .jpg or .png file from your computer."></span>
                    </div>
                    <div class="col-sm-12 col-md-6 box-input">
                        <div class="croppreviewimagevcrad" style="background: url(#) 0% 0% / 84px no-repeat rgb(245, 248, 250);
                        border-radius: 50%;">
                            <div class="no-event-image-selected">
                                No image uploaded
                            </div>
                        </div>
                        <input type="file" id="vcard_avtar_image" style="display: none;" />
                    </div>
                    <div class="col-sm-12 col-md-3 box-input">
                       <button type="button" class="btn btn-danger uploadAvtarImage mt-5"> <i class="fa fa-upload"></i> Upload</button>
                    </div>

                </div>

                <hr class="whiteHr">

                <div class="row col-md-12 mb-10">
                    <div class="col-sm-12 col-md-4 box-label">
                        Name :
                    </div>
                    <div class="col-sm-12 col-md-4 box-input">
                        <input type="text" name="first_name" id="first_name" placeholder="First Name">
                    </div>
                    <div class="col-sm-12 col-md-4 box-input">
                        <input type="text" name="last_name" id="last_name" placeholder="Last Name">
                    </div>
                </div>
                <div class="row col-md-12 mb-10">
                    <div class="col-sm-12 col-md-4 box-label">
                        Numbers :
                    </div>
                    <div class="col-sm-12 col-md-8 box-input">
                        <input type="text" name="mobile_number" id="mobile_number" placeholder="Mobile Number">
                    </div>
                </div>
                <div class="row col-md-12 mb-10">
                    <div class="col-sm-12 col-md-4 box-label">

                    </div>
                    <div class="col-sm-12 col-md-4 box-input">
                        <input type="text" name="home_phone" id="home_phone" placeholder="Phone">
                    </div>
                    <div class="col-sm-12 col-md-4 box-input">
                        <input type="text" name="fax_number" id="fax_number" placeholder="Fax">
                    </div>
                </div>
                <div class="row col-md-12 mb-10">
                    <div class="col-sm-12 col-md-4 box-label">
                        Email :
                    </div>
                    <div class="col-sm-12 col-md-8 box-input">
                        <input type="email" name="email" id="email" placeholder="your@email.com">
                    </div>
                </div>
                <div class="row col-md-12 mb-10">
                    <div class="col-sm-12 col-md-4 box-label">
                        Company :
                    </div>
                    <div class="col-sm-12 col-md-4 box-input">
                        <input type="text" name="company" id="company" placeholder="Company">
                    </div>
                    <div class="col-sm-12 col-md-4 box-input">
                        <input type="text" name="designation" id="your_job" placeholder="Your Job">
                    </div>
                </div>
                <div class="row col-md-12 mb-10" id="apiAddress">
                    <div class="col-sm-12 col-md-4 box-label">
                        Address :
                    </div>
                    <div class="col-sm-12 col-md-8 box-input">
                        <input type="text" name="address" id="address" placeholder="Enter your address" class="autocomplete">
                    </div>
                </div>
                <div class="row col-md-12 mb-10" id="fullAddress" style="display: none;">
                    <div class="col-sm-12 col-md-4 box-label">
                        Address :
                    </div>
                    
                        <div class="col-sm-12 col-md-6 box-input">
                            <input type="text" name="street_address" id="street_address" placeholder="Street address">
                        </div>
                        <div class="col-sm-12 col-md-2 box-input">
                            <input type="text" name="number" id="number" placeholder="Number">
                        </div>
                        <div class="col-sm-12 col-md-4 box-label">
                            
                        </div>
                        <div class="col-sm-12 col-md-4 box-input">
                            <input type="text" name="city" id="city" placeholder="City">
                        </div>
                        <div class="col-sm-12 col-md-2 box-input">
                            <input type="text" name="state" id="state" placeholder="State">
                        </div>
                        <div class="col-sm-12 col-md-2 box-input">
                            <input type="text" name="zipcode" id="zipcode" placeholder="Zipcode">
                        </div>
                        <div class="col-sm-12 col-md-4 box-label">
                            
                        </div>
                        <div class="col-sm-12 col-md-8 box-input">
                            <input type="text" name="country" id="country" placeholder="Country">
                        </div>
                        <input type="hidden" name="latitude" id="latitude">
                        <input type="hidden" name="longitude" id="longitude">
                </div>
                <div class="addressBox">
                    <div class="additional-link" type="1">
                        Enter address        
                    </div>
                </div>

                <div class="row col-md-12" id="direction_show_box" style="display: none;">
                    <div class="col-sm-12 col-md-4 box-input">

                    </div>
                    <div class="col-sm-12 col-md-8 box-input">
                        <input type="checkbox" id="is_direction_show" name="is_direction_show" checked value="1"> 
                        <label class="checkbox_label ml-20" for="is_direction_show" style="cursor: pointer;">
                            Show Directions button
                        </label>
                    </div>
                </div>
                <div class="row col-md-12 mb-10">
                    <div class="col-sm-12 col-md-4 box-label">
                        Website :
                    </div>
                    <div class="col-sm-12 col-md-8 box-input">
                        <input type="url" name="website_link" id="website_link" placeholder="https://www.your-website.com">
                    </div>
                </div>
                <div class="row col-md-12 mb-10">
                    <div class="col-sm-12 col-md-4 box-label">
                        Summary :
                    </div>
                    <div class="col-sm-12 col-md-8 box-input">
                        <textarea name="summary" id="summary" cols="30" rows="5" class="textareacount" maxlength="250"></textarea>
                        <div class="charleft originalTextareaInfo"><span>0</span> / 250</div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<input type="hidden" name="avtarImage" id="avtarImage">

<div class="modal fade" id="avtarmodal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img id="cropimagevcard" src="">
                        </div>
                        <div class="col-md-4">
                            <div class="croppreviewvcard"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="vcardcrop">Confirm</button>
            </div>
        </div>
    </div>
</div>
