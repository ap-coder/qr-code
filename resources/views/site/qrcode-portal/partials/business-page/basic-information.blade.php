<div class="form-container BusinessInformations" style="overflow: inherit">
    <div class="section-header section-open not-formly">
        <div class="row form-title-row">
            <div class="col-md-1 box-icon hidden-sm">
                <div class="round-no text-center mt10" style="margin-top: 24px !important;">
                    <i class="fas fa-info-circle"></i>
                </div>
            </div>
            <div class="col-sm-12 col-md-11 box-title">
                <h3>Basic Information</h3>
            </div>
        </div>
    </div>
    <div class="section-body"  style="overflow: inherit">
        <div class="section_type_container section_information">
            <div class="row form-input-row formly-field">
                <div class="col-lg-offset-1 col-sm-12 col-lg-11 mb-10">
                    <p class="section-subheadline">Introduce your business or organization in a few words. Optionally,
                        add a button to a website of your choice. Fields marked with a * are mandatory.</p>
                </div>


                <div class="row col-md-12 mb-10">
                    <div class="col-sm-12 col-md-3 box-label">
                        Company: <span>*</span>
                    </div>
                    <div class="col-sm-12 col-md-9 box-input">
                        <input type="text" placeholder="Name of company or organization" id="business_company"
                            name="company" required="required" value="Joy's Cafe">
                    </div>

                </div>
                <div class="row col-md-12 mb-10">
                    <div class="col-sm-12 col-md-3 box-label">
                        Headline: <span>*</span>
                    </div>
                    <div class="col-sm-12 col-md-9 box-input">
                        <input type="text" placeholder="Add a headline or slogan" id="business_headline"
                            name="headline" required="required" value="Eat. Refresh. Go.">
                    </div>

                </div>
                <div class="row col-md-12 mb-10">
                    <div class="col-sm-12 col-md-3 box-label">
                        Summary:
                    </div>
                    <div class="col-sm-12 col-md-9 box-input">
                        <textarea placeholder="Write a short summary about the type and purpose of your business" maxlength="200"
                            id="business_summary" name="summery" spellcheck="false" rows="4" class="aboutSocialMedia textareacount">We aim to provide fresh and healthy snacks for people on the go.</textarea>
                        <div class="charleft originalTextareaInfo"> <span>74</span> / 200</div>
                    </div>

                </div>
                <div class="row col-md-12 mb-10" id="businessMenuButtons">
                    <div class="col-sm-12 col-md-3 box-label">
                        Button: <span>*</span>
                    </div>
                    <div class="col-sm-12 col-md-4 box-input">
                        <div class="input-group">
                            <ul class="dropdown-menu buttonSelection">
                                <li>
                                    <a href="javascript:void(0);" class="buttonLink">Learn more</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="buttonLink">View menu</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="buttonLink">Shop online</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="buttonLink">Apply now</a>
                                </li>
                                <li class="customedit">
                                    <a href="javascript:void(0);">
                                        <i class="fa fa-edit"></i>Custom
                                    </a>
                                </li>
                            </ul>

                            <input type="text" name="button_text" value="View menu" id="business_button_text" required>
                            <span
                                class="input-group-addon" data-toggle="dropdown"><span
                                    class="fa fa-angle-down"></span></span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5 box-input">
                        <input type="text" placeholder="http://www." id="business_button_lnk" name="button_lnk"
                            required="required">
                            <button type="button" class="btn btn-link pull-right removeMenuButton">Remove button</button>
                    </div>

                    <div class="col-xs-12 hide" id="AddBusinessButtonDiv">
                        <button type="button" class="btn btn-link AddBusinessButton">Add button</button>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>
