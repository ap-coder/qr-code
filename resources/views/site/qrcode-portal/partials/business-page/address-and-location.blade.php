<div class="form-container">
    <div class="section-header section-open not-formly">
        <div class="row form-title-row">
            <div class="col-md-1 box-icon hidden-sm">
                <div class="round-no text-center mt10" style="margin-top: 24px !important;">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
            </div>
            <div class="col-sm-12 col-md-11 box-title">
                <h3>Address & Location</h3>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="section_type_container section_information vcardInformations">
            <div class="row form-input-row formly-field">
                <div class="col-lg-offset-1 col-sm-12 col-lg-11 mb-10">
                    <p class="section-subheadline">Provide your address and location information.</p>
                </div>
                
                <div class="row col-md-12 mb-10" id="businessapiAddress" style="display: none;">
                    <div class="col-sm-12 col-md-4 box-label">
                        Address :
                    </div>
                    <div class="col-sm-12 col-md-8 box-input">
                        <input type="text" name="address" id="business_address" placeholder="Enter your address" class="autocomplete">
                    </div>
                </div>
                <div class="row col-md-12 mb-10" id="businessfullAddress">
                    <div class="col-sm-12 col-md-4 box-label">
                        Address :
                    </div>
                    
                        <div class="col-sm-12 col-md-6 box-input">
                            <input type="text" name="street_address" id="business_street_address" placeholder="Street address" value="Mission Street">
                        </div>
                        <div class="col-sm-12 col-md-2 box-input">
                            <input type="text" name="number" id="business_number" placeholder="Number" value="526">
                        </div>
                        <div class="col-sm-12 col-md-4 box-label">
                            
                        </div>
                        <div class="col-sm-12 col-md-4 box-input">
                            <input type="text" name="city" id="business_city" placeholder="City" value="San Francisco">
                        </div>
                        <div class="col-sm-12 col-md-2 box-input">
                            <input type="text" name="state" id="business_state" placeholder="State" value="CA">
                        </div>
                        <div class="col-sm-12 col-md-2 box-input">
                            <input type="text" name="zipcode" id="business_zipcode" placeholder="Zipcode" value="94105">
                        </div>
                        <div class="col-sm-12 col-md-4 box-label">
                            
                        </div>
                        <div class="col-sm-12 col-md-8 box-input">
                            <input type="text" name="country" id="business_country" placeholder="Country" value="United States">
                        </div>
                        <input type="hidden" name="latitude" id="business_latitude">
                        <input type="hidden" name="longitude" id="business_longitude">
                </div>
                <div class="addressBox">
                    <div class="additional-link additional-business-button" type="2">
                        Reset address
                    </div>
                </div>

                <hr class="whiteHr">

                <div class="row col-md-12 mb-10">
                    <div class="col-sm-12 col-md-4 box-label">
                        Features :
                    </div>

                    <div class="col-sm-12 col-md-8">
                        <p class="section-subheadline">Choose amenities available at your venue. Recommended for gastronomy and retail.
                        </p>

                        <div class="featureIcons">
                            <ul class="features-container">
                                @foreach(App\Models\BusinessFeatureIcon::FEATURE_ICONS as $key => $icon)
                                <li>
                                    <i class="{{ $icon }}" key="{{ $key }}"></i>
                                </li>
                                <input type="checkbox" name="feature_icons[]" id="feature_icons{{ $key }}" value="{{ $key }}" style="display: none;">
                               @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
               
            </div>
        </div>


    </div>
</div>