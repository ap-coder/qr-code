<div class="col-md-8">
    <div class="content-group">
        <div class="row industry_search">
            <div class="create_header create_header--position">
                <h3 class="create_heading">Select your QR Code type</h3>

                <div class="create-header_search-box">
                    <select name="industry" id="industry" class="form-control select2" style="width: 100%;">
                        <option value="">Or select your industry for recommendations</option>
                        @foreach ($qrIndustries as $qrIndustry)
                            <option value="{{ $qrIndustry->id }}">{{ $qrIndustry->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="content-wrapper text-center">
                <span class="title ">
                    <span class="text">Dynamic Codes</span>
                </span>
            </div>
        </div>

        <div class="row dynamiccodes">

            @foreach ($qrTypes as $qrType)
                <div class="code-type-card col-lg-6 col-sm-12">
                    <a class="btn-codetype chooseType" href="javascript:void(0);" typeId="{{ $qrType->id }}"
                        type="{{ $qrType->select_type }}">
                        <i class="{{ $qrType->icon_class }} pull-left"></i>
                        <h4>{{ $qrType->title }}</h4>
                        <small class="text-ellipsis" title="{{ $qrType->subtitle }}">
                            {{ $qrType->subtitle }}
                        </small>
                    </a>
                </div>
            @endforeach


        </div>

    </div>

</div>

<div class="col-md-4">
    <div class="creation-no-default" style="display: block;">
        <img src="{{ asset('site/img/CodyE_PointingLeft.svg') }}">
        <div>Please choose one to view a page preview</div>
    </div>
    <div class="preview-smartphone clearfix active mockup__smartphone" style="display: none;">
        <div class="preview-smartphone-wrapper noVideo mockup__smartphone-wrapper">
            <div id="smartphonePlaceholder" class="placeholder ratchet"></div>
            <div class="previewNoVideoText">
                <span class="static-code-text" style="display: none">No live preview</span>
                <div class="code-white-card" style="display: block;">
                    <img id="code-image" src="">
                    <div class="code-text">
                        <i id="code-icon" class="pull-left"></i>
                        <span>
                            Scan to see a live preview </span>
                    </div>
                </div>
            </div>

            <div id="imgPlaceholder" class="placeholder ratchet previewNoVideo" style="overflow: hidden;"><img src=""
                    style="max-width:320px;width:320px;"></div>
        </div>
    </div>
</div>
