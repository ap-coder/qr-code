<!-- Modal -->
@php
    $matrixPointSize = 24;
    $errorCorrectionLevel = 'M'; 
@endphp
<div id="designQrModal" class="modal fade qrcdr" role="dialog">
    <div class="modal-dialog modal-lg">
        <form role="form" class="qrcdr-form needs-validation w-100" novalidate>
            <input type="submit" class="d-none">
            <input type="hidden" name="section" id="getsec" value="#link">

            <!-- Modal content-->
            <div class="modal-content" id="collapseSettings">
                <div class="modal-header">
                    <h4 class="modal-title">Design QR Code</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="link" id="malink" class="form-control" placeholder="http://"
                        required="required">
                    <div class="row">
                        <div class="col-md-4 qrmodalleft placeresult">
                            <input type="hidden" class="holdresult">
                            <div class="preloader"><i class="fa fa-cog fa-spin"></i></div>
                            <div class="resultholder">
                                <img src="{{ asset('site/img/placeholder.svg') }}" alt="placeholder">
                            </div>
                            <button class="btn btn-lg btn-block btn-primary ellipsis generate_qrcode rounded-pill mt-4" disabled><i class="fa fa-download"></i> Download</button>
                            <div class="text-center mt-2 linksholder"></div>
                        </div>
                        <div class="col-md-8">
                            <div class="col-sm-12 mb-2 custom-background">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Background</label>
                                        <div class="collapse show" id="collapse-background">
                                            <input type="text"
                                                class="form-control qrcolorpicker colorpickerback rounded-0"
                                                value="#ffffff" name="backcolor">
                                        </div>
                                        <div class="custom-control custom-switch mt-2">
                                            <input type="checkbox" class="custom-control-input" id="trans-bg"
                                                name="transparent">
                                            <label class="custom-control-label" for="trans-bg">Transparent
                                                background</label>
                                        </div>
                                        <div class="custom-control custom-switch mb-2">
                                            <input type="checkbox" class="custom-control-input collapse-control"
                                                id="transparent-qr" data-bs-target="#collapse-image-bg"
                                                data-target="#collapse-image-bg" name="transparent_code">
                                            <label class="custom-control-label" for="transparent-qr">Background
                                                image</label>
                                        </div>
                                        <div class="collapse" id="collapse-image-bg">
                                            <div class="image-editor">
                                                <button title="Background image" type="button"
                                                    class="btn btn-primary select-image-btn rounded-0"><i
                                                        class="fa fa-upload"></i></button>
                                                <button type="button"
                                                    class="btn btn-primary export-bg-image d-none rounded-0"><i
                                                        class="fa fa-check"></i></button>
                                                <button type="button"
                                                    class="btn btn-primary remove-bg-image d-none rounded-0"><i
                                                        class="fa fa-times"></i></button>
                                                <input type="file" class="cropit-image-input nopreview">
                                                <div class="cropit-preview mx-auto"></div>
                                                <input type="range"
                                                    class="cropit-image-zoom-input qrcdr-slider-input nopreview">
                                            </div>
                                            <input id="bg_image" type="hidden" name="bg_image">
                                            <div class="custom-control custom-switch d-none negative-code">
                                                <input type="checkbox" class="custom-control-input" id="negative-qr"
                                                    name="negative_qr">
                                                <label class="custom-control-label" for="negative-qr">Masked</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Foreground</label>
                                        <input type="text" class="form-control qrcolorpicker rounded-0" value="#000000"
                                            name="frontcolor">

                                        <div class="form-group">
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input collapse-control"
                                                    id="gradient-bg" data-bs-target="#collapse-gradient"
                                                    data-target="#collapse-gradient" name="gradient">
                                                <label class="custom-control-label" for="gradient-bg">Gradient</label>
                                            </div>
                                        </div>
                                        <div class="collapse" id="collapse-gradient">
                                            <label>Second color</label>
                                            <input type="text"
                                                class="form-control qrcolorpicker qrcolorpicker_bg rounded-0"
                                                value="#8900D5" name="gradient_color">
                                            <div class="form-group">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="radial-gradient" name="radial">
                                                    <label class="custom-control-label"
                                                        for="radial-gradient">Radial</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="markers">
                                <div class="col-md-12">
                                    <label>Frame</label>
                                </div>
                                <div class="col-12 mb-2 py-2">
                                    <div class="btn-group-toggle styleselecta d-inline-block" data-toggle="buttons">
                                        @foreach ($frames as $frame => $values)
                                            @php
                                                $activeattr = $frame == 'none' ? 'checked' : '';
                                                $viewH = isset($values['label_size']) && isset($values['label_offset']) ? (24 + $values['label_size'] + 2 + $values['label_offset']) : 24;
                                            @endphp
                                            
                                            <label class="btn btn-light p-1">
                                                <input type="radio" name="outer_frame" value="{{ $frame }}" {{ $activeattr }} class="btn-check">
                                                <svg width="48" height="56" viewBox="0 0 24 {{ $viewH }}" fill="currentColor" xmlns="http://www.w3.org/2000/svg">{!! $values['path'] !!}</svg>
                                            </label>
                                            @endforeach
                                        </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Frame label</label>
                                            <input class="form-control" type="text" name="framelabel" value="SCAN ME">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Label font</label>
                                            <select name="label_font" class="form-select custom-select">
                                                <?php
                                                $getfonts = glob($fontdir.'*.svg');
                                                foreach ($getfonts as $key => $font) {
                                                    ?>
                                                <option value="<?php echo basename($font); ?>">
                                                    <?php echo basename($font, '.svg'); ?>
                                                </option>
                                                    <?php
                                                } ?>
                                            </select>
                                        </div>
                                        <div class="col-12 qrcdr-slider">
                                            <input type="range" min="50" max="100" value="100" class="qrcdr-slider-input" name="label-text-size">
                                            <label class="small">Text size: <span class="qrcdr-slider-value"></span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mb-2">
                                    <div class="row collapse" id="collapse-frame-color">
                                        <div class="col-sm-6 mt-2">
                                            <label>Frame color</label>
                                            <input type="text" class="form-control qrcolorpicker rounded-0" value="#000000" name="framecolor">
                                        </div>
                                    </div>
                        
                                    <div class="form-group mt-2">
                                        <div class="custom-control custom-switch">
                                          <input type="checkbox" class="custom-control-input collapse-control" id="frame-color" data-bs-target="#collapse-frame-color" data-target="#collapse-frame-color" name="custom_frame_color">
                                          <label class="custom-control-label" for="frame-color">Custom frame color</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label>Pattern</label>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <div class="btn-group-toggle styleselecta d-inline-block" data-toggle="buttons">
                                    @foreach ($markersIn as $marker => $values)
                                        @if (isset($values['preview']))
                                            @php
                                                $activeattr = ($marker == 'default') ? 'checked' : '';
                                            @endphp
                                            <label class="btn btn-light p-1 m-1">
                                                <input type="radio" name="pattern" value="{{ $marker }}" {{ $activeattr }} class="btn-check">
                                                <svg width="38" height="38" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">{!! $values['preview'] !!}</svg>
                                            </label>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label>Marker border</label>
                                </div>
                                <div class="col-md-12 mb-2">
                                    <div class="btn-group-toggle styleselecta d-inline-block" data-toggle="buttons">
                                        @foreach ($markers as $marker => $values)
                                            @php
                                                $activeattr = ($marker == 'default') ? 'checked' : '';
                                            @endphp
                                            <label class="btn btn-light p-1 m-1">
                                                <input type="radio" name="marker_out" value="{{ $marker }}" {{ $activeattr }} class="btn-check">
                                                <svg width="32" height="32" viewBox="0 0 14 14" fill="currentColor" xmlns="http://www.w3.org/2000/svg">{!! $values['path'] !!}</svg>
                                            </label>
                                            @endforeach
                                       </div>
                                </div>

                                <div class="col-md-12">
                                    <label>Marker center</label>
                                </div>
                                <div class="col-md-12">
                                    <div class="btn-group-toggle styleselecta d-inline-block" data-toggle="buttons">
                                        @foreach ($markersIn as $marker => $values)
                                            @if (isset($values['marker']) && $values['marker'] === true)
                                                @php
                                                    $activeattr = ($marker == 'default') ? 'checked' : '';
                                                @endphp
                                                <label class="btn btn-light p-1 m-1">
                                                    <input type="radio" name="marker_in" value="{{ $marker }}" {{ $activeattr }} class="btn-check">
                                                    <svg width="14" height="14" viewBox="0 0 6 6" fill="currentColor" xmlns="http://www.w3.org/2000/svg">{!! $values['path'] !!}</svg>
                                                </label>
                                                @endif
                                            @endforeach
                                        </div>
                                </div>

                                <div class="col-md-12 mb-2">
                                    <div class="row collapse collapse-markers-bg">
                                        <div class="col-sm-6 mt-2">
                                            <label>Marker border</label>
                                            <div class="input-group rounded-0">
                                              <span class="input-group-text rounded-0 border-0 text-dark"><svg width="1em" height="1em" viewBox="0 0 14 14" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0,0v14h14V0H0z M12,12H2V2h10V12z"></path></svg></span>
                                              <input type="text" class="qrcolorpicker form-control rounded-0" value="#000000" name="marker_out_color">
                                            </div>
                                        </div>
                        
                                        <div class="col-sm-6 mt-2">
                                            <label>Marker center</label>
                                            <div class="input-group rounded-0">
                                              <span class="input-group-text rounded-0 border-0 text-dark"><svg width="1em" height="1em" viewBox="0 0 6 6" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><rect width="6" height="6"></rect></svg></span>
                                              <input type="text" class="qrcolorpicker form-control rounded-0" value="#000000" name="marker_in_color">
                                            </div>
                                        </div>
                                    </div>
                        
                                    <div class="row">
                                        <div class="col-md-12 mt-2">
                                            <div class="custom-control custom-switch">
                                              <input type="checkbox" class="custom-control-input collapse-control" id="markers-bg" data-bs-target=".collapse-markers-bg" data-target=".collapse-markers-bg" name="markers_color">
                                              <label class="custom-control-label" for="markers-bg">Custom marker color</label>
                                            </div>
                                        </div>
                                    </div>
                        
                                    <div class="collapse collapse-markers-bg">
                                        <div class="row">
                                            <div class="col-md-12 mt-2">
                                                <div class="custom-control custom-switch">
                                                  <input type="checkbox" class="custom-control-input collapse-control" id="different-markers-bg" data-bs-target="#collapse-different-markers-bg" data-target="#collapse-different-markers-bg" name="different_markers_color">
                                                  <label class="custom-control-label" for="different-markers-bg">Different markers colors</label>
                                                </div>
                                            </div>
                                        </div>
                        
                                        <div class="row collapse" id="collapse-different-markers-bg">
                                            <div class="col-sm-6 mt-2">
                                                <label>Top Right</label>
                                                <div class="input-group rounded-0">
                                                  <span class="input-group-text rounded-0 border-0 text-dark"><svg width="1em" height="1em" viewBox="0 0 14 14" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0,0v14h14V0H0z M12,12H2V2h10V12z"></path></svg></span>
                                                  <input type="text" class="qrcolorpicker form-control rounded-0" value="#000000" name="marker_top_right_outline">
                                                </div>
                                            </div>
                        
                                            <div class="col-sm-6 mt-2">
                                                <label>Top Right</label>
                                                <div class="input-group rounded-0">
                                                  <span class="input-group-text rounded-0 border-0 text-dark"><svg width="1em" height="1em" viewBox="0 0 6 6" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><rect width="6" height="6"></rect></svg></span>
                                                  <input type="text" class="qrcolorpicker form-control rounded-0" value="#000000" name="marker_top_right_center">
                                                </div>
                                            </div>
                        
                                            <div class="col-sm-6 mt-2 mb-2">
                                                <label>Bottom Left</label>
                                                <div class="input-group rounded-0">
                                                  <span class="input-group-text rounded-0 border-0 text-dark"><svg width="1em" height="1em" viewBox="0 0 14 14" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M0,0v14h14V0H0z M12,12H2V2h10V12z"></path></svg></span>
                                                  <input type="text" class="qrcolorpicker form-control rounded-0" value="#000000" name="marker_bottom_left_outline">
                                                </div>
                                            </div>
                        
                                            <div class="col-sm-6 mt-2 mb-2">
                                                <label>Bottom Left</label>
                                                <div class="input-group rounded-0">
                                                  <span class="input-group-text rounded-0 border-0 text-dark"><svg width="1em" height="1em" viewBox="0 0 6 6" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><rect width="6" height="6"></rect></svg></span>
                                                  <input type="text" class="qrcolorpicker form-control rounded-0" value="#000000" name="marker_bottom_left_center">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        
                                </div>

                                <div class="col-md-12">
                                    <label>Logo</label>
                                </div>
                                <div class="col-md-12">
                                    <small>Upload your logo or select a watermark</small>
                                    <div class="custom-file">
                                      <input type="file" name="file" class="custom-file-input form-control" aria-describedby="validate-upload" id="upmarker">
                                        <div id="validate-upload" class="invalid-feedback">
                                            Invalid image
                                        </div>
                                      <label class="custom-file-label" for="file"></label>
                                    </div>
                                </div>

                                <div class="col-12 pt-2">
                                    <div class="logoselecta form-group">
                                        <div class="btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-light">
                                                <input type="radio" name="optionlogo" value="none" checked="" class="btn-check">
                                                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                </svg>
                                            </label>
                                            @php
                                                $optionlogo='none';
                                            @endphp
                                            @foreach ($watermarks as $key => $water)
                                                <label class="btn btn-light mt-1 
                                                @if ($optionlogo == $water) active @endif">
                                                @php $watervalue = $water; @endphp
                                               <input type="radio" name="optionlogo" value="{{ str_replace(public_path(), '', $water) }}" 
                                                @if ($optionlogo == $watervalue) checked  @endif
                                                id="optionlogo{{ $key }}" class="btn-check"><img src="{{ str_replace(public_path(), '', $water) }}"></label>
                                                @endforeach
                                            <label class="btn btn-light custom-watermark"><input type="radio" name="optionlogo" value="" class="btn-check"><div class="hold-custom-watermark"></div></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mb-2">
                                    <div class="custom-control custom-switch">
                                      <input type="checkbox" class="custom-control-input" id="no-logo-bg" name="no_logo_bg">
                                      <label class="custom-control-label" for="no-logo-bg">Remove background behind Logo</label>
                                    </div>
                                </div>
                        
                                <div class="col-12 qrcdr-slider">
                                    <input type="range" min="30" max="100" value="100" class="qrcdr-slider-input" name="logo_size">
                                    <label class="small">Logo size: <span class="qrcdr-slider-value"></span></label>
                                </div>

                                <div class="col-md-12">
                                    <label>Options</label>
                                </div>

                                <div class="col-sm-12 mb-2">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Size</label>
                                            <select name="size" class="form-select custom-select qrcode-size-selector">
                                        <?php
                                        for ($i=8; $i<=32; $i+=4) {
                                            $value = $i*25;
                                            echo '<option value="'.$i.'" '.( $matrixPointSize == $i ? 'selected' : '' ) . '>'.$value.'</option>';
                                        }; ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>Precision</label>
                                            <select name="level" class="form-select custom-select">
                                                <option value="L" <?php if ($errorCorrectionLevel=="L") echo "selected"; ?>>
                                                    L - Smallest
                                                </option>
                                                <option value="M" <?php if ($errorCorrectionLevel=="M") echo "selected"; ?>>
                                                    M - Medium 
                                                </option>
                                                <option value="Q" <?php if ($errorCorrectionLevel=="Q") echo "selected"; ?>>
                                                    Q - High
                                                </option>
                                                <option value="H" <?php if ($errorCorrectionLevel=="H") echo "selected"; ?>>
                                                    H - Best
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>
