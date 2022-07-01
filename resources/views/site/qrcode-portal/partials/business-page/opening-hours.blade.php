<div class="form-container" style="overflow: inherit">
    <div class="section-header section-open not-formly">
        <div class="row form-title-row">
            <div class="col-md-1 box-icon hidden-sm">
                <div class="round-no text-center mt10" style="margin-top: 24px !important;">
                    <i class="fas fa-clock"></i>
                </div>
            </div>
            <div class="col-sm-12 col-md-11 box-title">
                <h3>Opening Hours</h3>
            </div>
        </div>
    </div>
    <div class="section-body"  style="overflow: inherit">
        <div class="section_type_container section_information">
            <div class="row form-input-row formly-field">
                <div class="col-lg-offset-1 col-sm-12 col-lg-11 mb-10">
                    <p class="section-subheadline">Provide your address and location information.</p>
                </div>


                @foreach(App\Models\Hour::DAY_SELECT as $key => $label)
                    <div class="row col-md-12 mb-10 day-range-section">
                        <div class="col-sm-12 col-md-3 box-label day-range-checkbox">
                            <input type="checkbox" name="day[]" id="day_{{ $key }}" checked value="{{ $key }}">
                            <label for="day_{{ $key }}">{{ $label }}</label>
                        </div>
                        <div class="col-sm-12 col-md-9 qr-time-range-list" id="day_range_{{ $key }}">
                           <div class="row qr-time-range-clone">
                                <div class="col-sm-12 col-md-5 box-input">
                                    <div class="input-group">
                                        @include('site.qrcode-portal.partials.business-page.times')
            
                                        <input type="text" name="open_time[{{ $key }}]" value="08:00 am" id="open_time_{{ $key }}">
                                        <span class="input-group-addon" data-toggle="dropdown">
                                            <span class="fa fa-angle-down"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-5 box-input">
                                    <div class="input-group">
                                        @include('site.qrcode-portal.partials.business-page.times')
            
                                        <input type="text" name="closing_time[{{ $key }}]" value="08:00 pm" id="closing_time_{{ $key }}">
                                        <span class="input-group-addon" data-toggle="dropdown">
                                            <span class="fa fa-angle-down"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-2 box-input day-range-button-div">
                                    <button type="button" class="btn add-time-range"><span class="fa fa-plus"></span></button>
                                </div>
                           </div>
                        </div>
                        

                    </div>
                @endforeach
                
            </div>
        </div>


    </div>
</div>
