<div class="form-container">
                <div class="section-header section-open not-formly">
                    <div class="row form-title-row">
                        <div class="col-md-1 box-icon hidden-sm">
                            <div class="round-no text-center mt10" style="margin-top: 24px !important;">
                                <i class="fas fa-random"></i>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-11 box-title">
                            <h3>Design & Customizations</h3>
                        </div>
                    </div>
                </div>
                <div class="section-body">
                    <div class="section_type_container section_information">
                        <div class="row form-input-row formly-field">
                            <div class="col-lg-offset-1 col-sm-12 col-lg-11 mb-10">
                                <p class="section-subheadline">Choose a color theme and upload an image for your Social
                                    Media page.</p>
                            </div>


                            <div class="row col-md-12 mb-10">
                                <div class="col-sm-12 col-md-3 box-label">
                                    Colors: <span class="btn-help-icon visible-lg-inline-block" title="" rel="tooltip"
                                        data-trigger="hover" data-placement="top"
                                        data-original-title="Select a theme or choose your own colors below."
                                        aria-describedby="tooltip569732"></span>
                                </div>
                                <div class="col-sm-12 col-md-9 box-input business-colors-list">
                                    <ul class="colors-list">
                                        <li>
                                            <a href="javascript:void(0);" class="active" c1="#447fb6"
                                                c2="#e91e63">
                                                <div class="c1"
                                                    style="background-color: rgb(68, 127, 182);"></div>
                                                <div class="c2" style="background-color: rgb(233, 30, 99);">
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" c1="#455a64" c2="#e91e63">
                                                <div class="c1" style="background-color: rgb(69, 90, 100);">
                                                </div>
                                                <div class="c2" style="background-color: rgb(233, 30, 99);">
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" c1="#d32f2f" c2="#ef9a9a">
                                                <div class="c1" style="background-color: rgb(211, 47, 47);">
                                                </div>
                                                <div class="c2"
                                                    style="background-color: rgb(239, 154, 154);"></div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" c1="#4caf50" c2="#81c784">
                                                <div class="c1" style="background-color: rgb(76, 175, 80);">
                                                </div>
                                                <div class="c2"
                                                    style="background-color: rgb(129, 199, 132);"></div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" c1="#795548" c2="#ff8a65">
                                                <div class="c1" style="background-color: rgb(121, 85, 72);">
                                                </div>
                                                <div class="c2"
                                                    style="background-color: rgb(255, 138, 101);"></div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="offset-4"></div>
                                <div class="col-sm-12 col-md-3 box-input">
                                    <small class="dark-semibold text-regular mb-5 inline-block">Primary</small>
                                    <div class="input-group color-picker colorpicker-element">
                                        <input type="text" value="#447fb6" class="form-control" id="business_primary_color"
                                            name="primary_color">
                                        <span class="input-group-addon">
                                            {{-- <div
                                                class="sp-replacer sp-light full-spectrum spectrum--rounded spectrum--rounded-solution">
                                                <div class="sp-preview">
                                                    <div class="sp-preview-inner"
                                                        style="background-color: #447fb6;"></div>
                                                </div>
                                            </div> --}}
                                        </span>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-2 box-input">
                                    <a href="javascript:void(0);" class="colorswapper businesscolorswapperexchange">
                                        <i class="fas fa-exchange-alt" aria-hidden="true"></i>
                                    </a>
                                </div>

                                <div class="col-sm-12 col-md-3 box-input">
                                    <small class="dark-semibold text-regular mb-5 inline-block">Button</small>
                                    <div class="input-group color-picker colorpicker-element">
                                        <input type="text" value="#e91e63" class="form-control" id="business_button_color"
                                            name="button_color">
                                        <span class="input-group-addon">
                                            {{-- <div
                                                class="sp-replacer sp-light full-spectrum spectrum--rounded spectrum--rounded-solution">
                                                <div class="sp-preview">
                                                    <div class="sp-preview-inner"
                                                        style="background-color: #e91e63;"></div>
                                                </div>
                                            </div> --}}
                                        </span>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="header-gallery-container showGallery">
                        <div class="header-gallery-content">
                            
                            <section id="UploadCustomBusinessImage">
                                <div class="row col-md-12 mb-10">
                                    <div class="col-sm-12 col-md-3 box-label">
                                        Image: <span class="btn-help-icon visible-lg-inline-block" title="" rel="tooltip"
                                            data-trigger="hover" data-placement="top"
                                            data-original-title="Upload an image or logo from your computer. Images must be at least 640 x 360 px in .jpg or .png format."></span>
                                            <small>640  x 360 px</small>
                                    </div>
                                    <div class="col-sm-12 col-md-6 box-input">
                                        <div class="cropcustompreviewBusinessImage">
                                            <img src="{{ asset('site/img/header.jpg') }}">
                                            <i class="fa fa-trash"></i>
                                        </div>
                                        <div class="uploadBusinessImageText">
                                            <span>No image uploaded</span>
                                        </div>
                                        <input type="file" id="business_banner_image" style="display: none;" />
                                    </div>
                                    <div class="col-sm-12 col-md-3 box-input uploadBusinessImageButtons">
                                       <button type="button" class="btn btn-info uploadBusinessBannerImage"> <i class="fa fa-upload"></i> Upload</button>

                                    </div>
                
                                </div>
                            </section>                           
                            
                            
                        </div>
                    </div>

                </div>
            </div>

            <input type="hidden" name="bannerImage" id="businessBannerImage" value="header.jpg">

            <div class="modal fade" id="customBusinessImagemodal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="img-container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <img id="cropcustomBusinessimage" src="">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="cropcustomBusinesspreview"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" id="customBusinesscrop">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>