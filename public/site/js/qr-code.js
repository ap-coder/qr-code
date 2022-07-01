$(document).ready(function() {
    let basUrl = $('#basUrl').val();
    $('.btn-help-icon').tooltip();

    $('.chooseType').click(function() {
        $('.chooseType').removeClass('active');
        $(this).addClass('active');

        var id = $(this).attr('typeId');
        var type = $(this).attr('type');
        $('.btn_create_next').attr('type', type);
        $('.btn-generator-prev').attr('type', type);
        $('.btn-generator-save-directly').attr('qrtype', type);

        var _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: basUrl + "getTypePreview",
            method: "POST",
            dataType: 'Json',
            data: {
                id: id,
                _token: _token
            },
            success: function(response) {

                $('#code-icon').removeClass();
                $('#code-icon').addClass(response.icon);

                if (response.mock_image) {
                    $('.creation-no-default').hide();
                    $('#imgPlaceholder img').attr('src', response.mock_image);
                    $('.mockup__smartphone').show();
                }
                if (response.hover_over_image) {
                    $('#code-image').attr('src', response.hover_over_image);
                } else {
                    $('.code-white-card').hide();
                    $('.static-code-text').show();
                }
            }
        })

        $(".btn_create_next").prop("disabled", false);

    });

    $('.btn_create_next').click(function() {
        $('.ladda-label').text('');
        $('.sk-three-bounce').show();
        var type = $(this).attr('type');

        $('#stepone').hide();
        $('.ladda-label').text('Next');
        $('.sk-three-bounce').hide();
        $('.firststep').hide();
        $('.secondstep').show();
        $('#stepform' + type).show();

        if ($('.photos-gallery-carousel').hasClass('slick-initialized'))
            $('.photos-gallery-carousel').slick('setPosition');
        else
            initSlider();

    });

    $('.btn-generator-prev').click(function() {
        var type = $(this).attr('type');

        $('#stepone').show();
        $('.firststep').show();
        $('.secondstep').hide();
        $('#stepform' + type).hide();

    });

    $('#UrlBarcode_url').keyup(function() {
        var url = $(this).val();
        if (url && !url.match(/^http([s]?):\/\/.*/)) {
            $('.browser-input').text('http://' + url);
        } else {
            $('.browser-input').text(url);
        }
    });

    $('#UrlBarcode_url').change(function() {
        var url = $(this).val();
        var check = isUrlValid(url);

        $('.preview-smartphone-wrapper').show();
        $('.preview-qrcode').hide();
        $('.previewtab').addClass('active');
        $('.qrcodetab').removeClass('active');

        if (check) {
            $('.box-input').removeClass('error');
            $('.box-input p').hide();
        } else {
            $('.box-input').addClass('error');
            $('.box-input p').show();
        }
    });

    $('.state-generator-data .btn-group .btn').click(function() {
        $('.state-generator-data .btn-group .btn').removeClass('active');
        $(this).addClass('active');
    });

    $('.previewtab').click(function() {
        $('.website-preview-smartphone-wrapper').show();
        $('.website-preview-qrcode').hide();
    });

    $('.qrcodetab').click(function() {
        var url = $('#UrlBarcode_url').val();
        var check = isUrlValid(url);

        $('.website-preview-smartphone-wrapper').hide();
        $('.website-preview-qrcode').show();

        if (check) {
            $('.box-input').removeClass('error');
            $('.box-input p').hide();
            $('.website-preview-qrcode').removeClass('barCodeError');
            $('.mockup__qrcode-error').hide();

            var _token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: "POST",
                dataType: "json",
                url: basUrl + "api/qrcode/process",
                data: { '_token': _token, 'link': url },
                success: function(data) {
                    // console.log(data.content);
                    $('.website-preview-qrcode .barcodeSVG').html(data.content);
                }
            });

        } else {
            $('.box-input').addClass('error');
            $('.box-input p').show();
            $('.website-preview-qrcode').addClass('barCodeError');
            $('.mockup__qrcode-error').show();
        }

    });

    $('.socialpreviewtab').click(function() {
        $('.social-preview-smartphone-wrapper').show();
        $('.social-preview-qrcode').hide();
    });

    $('.vcardpreviewtab').click(function() {
        $('.vcard-preview-smartphone-wrapper').show();
        $('.vcard-preview-qrcode').hide();
    });

    $('.businesspreviewtab').click(function() {
        $('.business-preview-smartphone-wrapper').show();
        $('.business-preview-qrcode').hide();
    });

    $('.socialqrcodetab').click(function() {

        $('.social-preview-smartphone-wrapper').hide();
        $('.social-preview-qrcode').show();
        $('#socialTab').val('tab');

        var form = $('#socialForm').submit();

        if (form.valid() == false) {
            $('.social-preview-smartphone-wrapper').show();
            $('.social-preview-qrcode').hide();
            $('.state-generator-data .btn-group .btn').removeClass('active');
            $('.socialpreviewtab').addClass('active');
        }

    });

    $('.vcardqrcodetab').click(function() {

        $('.vcard-preview-smartphone-wrapper').hide();
        $('.vcard-preview-qrcode').show();
        $('#vCardTab').val('tab');

        var form = $('#vCardPlusForm').submit();

        if (form.valid() == false) {
            $('.vcard-preview-smartphone-wrapper').show();
            $('.vcard-preview-qrcode').hide();
            $('.state-generator-data .btn-group .btn').removeClass('active');
            $('.vcardpreviewtab').addClass('active');
        }

    });

    $('.businessqrcodetab').click(function() {

        $('.business-preview-smartphone-wrapper').hide();
        $('.business-preview-qrcode').show();
        $('#businessTab').val('tab');

        var form = $('#businessPageForm').submit();

        if (form.valid() == false) {
            $('.business-preview-smartphone-wrapper').show();
            $('.business-preview-qrcode').hide();
            $('.state-generator-data .btn-group .btn').removeClass('active');
            $('.businesspreviewtab').addClass('active');
        }

    });



    $('.input--title-editing').keyup(function() {
        var val = $(this).val();
        if (val) {
            $(this).parent().find('.section-title__label').addClass('section-title__label--hide');
            $('#website_qr_title_error').hide();
        } else {
            $(this).parent().find('.section-title__label').removeClass('section-title__label--hide');
            $('#website_qr_title_error').show();
        }

    });

    $('.btn-generator-save-directly').click(function() {

        var type = $(this).attr('qrtype');

        if (type == 1) {
            $('#websiteForm').submit();
        }
        if (type == 2) {
            $('#socialTab').val('button');
            $('#socialForm').submit();
        }
        if (type == 3) {
            $('#businessTab').val('button');
            $('#businessPageForm').submit();
        }
        if (type == 4) {
            $('#vCardTab').val('button');
            $('#vCardPlusForm').submit();
        }

        // if (type == 1) {
        //     title = $('#website_qr_title').val();
        //     var url = $('#UrlBarcode_url').val();
        //     var check = isUrlValid(url);
        //     if (check == false) {
        //         $('.box-input p').show();
        //         return false;
        //     } else {
        //         $('.box-input p').hide();
        //     }
        // }

        // $('.ladda-label').text('');
        // $('.sk-three-bounce').show();
        // $(".ladda-button").prop("disabled", true);

        // if (title) {
        //     $('.box-input').removeClass('error');
        //     // $('.box-input p').hide();
        //     $('#qr_title_error_' + type).hide();
        // } else {
        //     $('.sk-three-bounce').hide();
        //     $('.box-input').addClass('error');
        //     // $('.box-input p').show();
        //     $('#qr_title_error_' + type).show();
        //     $('.ladda-label').text('Next');
        //     $(".ladda-button").prop("disabled", false);
        // }

    });

    $(document).ready(function() {

        $('#websiteForm').validate({
            rules: {
                qr_name: {
                    required: true,
                },
                url: {
                    required: true,
                    url: true
                }
            },
            submitHandler: function(form) { // for demo

                var formData = $('#websiteForm').serialize();

                $('.ladda-label').text('');
                $('.sk-three-bounce').show();
                $(".ladda-button").prop("disabled", true);

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: basUrl + "api/qrcode/website",
                    data: formData,
                    success: function(data) {
                        $('#websiteId').val(data.id);
                        $('#malink').val(data.link);
                        $('.resultholder').html(data.content);
                        $('#designQrModal').modal('show');
                        $('.ladda-label').text('Next');
                        $('.sk-three-bounce').hide();
                        $(".ladda-button").prop("disabled", false);
                    }
                });

                return false; // for demo
            }
        });

        $('#socialForm').validate({
            rules: {
                qr_name: {
                    required: true,
                },
                'url[]': {
                    required: true,
                }
            },
            submitHandler: function(form) { // for demo

                var formData = $('#socialForm').serialize();

                // console.log('formData', formData);
                $('.ladda-label').text('');
                $('.sk-three-bounce').show();
                $(".ladda-button").prop("disabled", true);

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: basUrl + "api/qrcode/socialChannel",
                    data: formData,
                    success: function(data) {
                        var tab = $('#socialTab').val();
                        $('#socialId').val(data.id);
                        $('#malink').val(data.link);
                        $('.resultholder').html(data.content);
                        if (tab == 'button') {
                            $('#designQrModal').modal('show');
                        }
                        $('.social-preview-qrcode .barcodeSVG').html(data.content);
                        $('.ladda-label').text('Next');
                        $('.sk-three-bounce').hide();
                        $(".ladda-button").prop("disabled", false);
                    }
                });

                return false; // for demo
            }
        });

        $('#vCardPlusForm').validate({
            rules: {
                qr_name: {
                    required: true,
                },
                'first_name': {
                    required: true,
                },
                'mobile_number': {
                    required: true,
                }
            },
            submitHandler: function(form) { // for demo

                var formData = $('#vCardPlusForm').serialize();

                // console.log('formData', formData);
                $('.ladda-label').text('');
                $('.sk-three-bounce').show();
                $(".ladda-button").prop("disabled", true);

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: basUrl + "api/qrcode/vCardPlus",
                    data: formData,
                    success: function(data) {
                        var tab = $('#vCardTab').val();
                        $('#vcardId').val(data.id);
                        $('#malink').val(data.link);
                        $('.resultholder').html(data.content);
                        if (tab == 'button') {
                            $('#designQrModal').modal('show');
                        }
                        $('.vcard-preview-qrcode .barcodeSVG').html(data.content);
                        $('.ladda-label').text('Next');
                        $('.sk-three-bounce').hide();
                        $(".ladda-button").prop("disabled", false);
                    }
                });

                return false; // for demo
            }
        });

        $('#businessPageForm').validate({
            rules: {
                qr_name: {
                    required: true,
                },

            },
            submitHandler: function(form) { // for demo

                var formData = $('#businessPageForm').serialize();

                // console.log('formData', formData);
                $('.ladda-label').text('');
                $('.sk-three-bounce').show();
                $(".ladda-button").prop("disabled", true);

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: basUrl + "api/qrcode/businessPage",
                    data: formData,
                    success: function(data) {
                        var tab = $('#businessTab').val();
                        $('#businessId').val(data.id);
                        $('#malink').val(data.link);
                        $('.resultholder').html(data.content);
                        if (tab == 'button') {
                            $('#designQrModal').modal('show');
                        }
                        $('.business-preview-qrcode .barcodeSVG').html(data.content);
                        $('.ladda-label').text('Next');
                        $('.sk-three-bounce').hide();
                        $(".ladda-button").prop("disabled", false);
                    }
                });

                return false; // for demo
            }
        });
    });

    $('.social-colors-list .colors-list li a').click(function() {

        $('.social-colors-list .colors-list li a').removeClass('active');
        $(this).addClass('active');
        var c1 = $(this).attr('c1');
        var c2 = $(this).attr('c2');
        $('#primary_color').val(c1);
        $('#button_color').val(c2);
        $('#primary_color').trigger('change');
        $('#button_color').trigger('change');

        $('.social-media-preview iframe').contents().find('.event-section-title').css({ 'background': c1 });
        $('.social-media-preview iframe').contents().find('.fabshare').css({ 'background': c2 });

    });

    $('.vcard-colors-list .colors-list li a').click(function() {

        $('.vcard-colors-list .colors-list li a').removeClass('active');
        $(this).addClass('active');
        var c1 = $(this).attr('c1');
        var c2 = $(this).attr('c2');
        var gradient = $('#vcard_gradient').val();

        $('#vcard_primary_color').val(c1);
        $('#vcard_button_color').val(c2);
        $('#vcard_primary_color').trigger('change');
        $('#vcard_button_color').trigger('change');


        if ($('#checkbox_show_gradient').is(':checked')) {
            var bg = 'linear-gradient(45deg, ' + c1 + ' 0%, ' + c1 + ' 1%, ' + gradient + ' 100%)';
        } else {
            var bg = c1;
        }

        $('.vcard-preview iframe').contents().find('.vcard-header').css({ 'background': bg });

        $('.vcard-preview iframe').contents().find('#saveContact .fabshare').css({ 'background': c2 });

    });

    $('.business-colors-list .colors-list li a').click(function() {

        $('.business-colors-list .colors-list li a').removeClass('active');
        $(this).addClass('active');
        var c1 = $(this).attr('c1');
        var c2 = $(this).attr('c2');

        $('#business_primary_color').val(c1);
        $('#business_button_color').val(c2);
        $('#business_primary_color').trigger('change');
        $('#business_button_color').trigger('change');

        $('.business-preview iframe').contents().find('.vcard-header .event-section-title').css({ 'background': c1 });

        $('.business-preview iframe').contents().find('.fabshare').css({ 'background': c2 });
        $('.business-preview iframe').contents().find('.event-slim-button').css({ 'color': c2 });

    });

    $('.colorswapperexchange').click(function() {

        var c1 = $('#primary_color').val();
        var c2 = $('#button_color').val();
        $('#primary_color').val(c2);
        $('#button_color').val(c1);
        $('#primary_color').trigger('change');
        $('#button_color').trigger('change');

        $('.social-media-preview iframe').contents().find('.event-section-title').css({ 'background': c2 });
        $('.social-media-preview iframe').contents().find('.fabshare').css({ 'background': c1 });

    });

    $('.businesscolorswapperexchange').click(function() {

        var c1 = $('#business_primary_color').val();
        var c2 = $('#business_button_color').val();
        $('#business_primary_color').val(c2);
        $('#business_button_color').val(c1);
        $('#business_primary_color').trigger('change');
        $('#business_button_color').trigger('change');

        $('.business-preview iframe').contents().find('.event-section-title').css({ 'background': c2 });
        $('.business-preview iframe').contents().find('.fabshare').css({ 'background': c1 });
        $('.business-preview iframe').contents().find('.event-slim-button').css({ 'color': c1 });

    });

    $('.vcardcolorsexchange').click(function() {

        var c1 = $('#vcard_primary_color').val();
        var c2 = $('#vcard_button_color').val();
        var gradient = $('#vcard_gradient').val();

        $('#vcard_primary_color').val(c2);
        $('#vcard_button_color').val(c1);
        $('#vcard_primary_color').trigger('change');
        $('#vcard_button_color').trigger('change');

        if ($('#checkbox_show_gradient').is(':checked')) {
            var bg = 'linear-gradient(45deg, ' + c2 + ' 0%, ' + c2 + ' 1%, ' + gradient + ' 100%)';
        } else {
            var bg = c2;
        }


        $('.vcard-preview iframe').contents().find('.vcard-header').css({ 'background': bg });
        $('.vcard-preview iframe').contents().find('#saveContact .fabshare').css({ 'background': c1 });

    });

    $('.colorpicker').on('click', function() {
        var c1 = $('#primary_color').val();
        var c2 = $('#button_color').val();

        var vc1 = $('#vcard_primary_color').val();
        var vc2 = $('#vcard_button_color').val();
        var gradient = $('#vcard_gradient').val();

        var bc1 = $('#business_primary_color').val();
        var bc2 = $('#business_button_color').val();

        var circleColor = $('.show-custom-color .color-picker-circle-input').val();

        if ($('#checkbox_show_gradient').is(':checked')) {
            var bg = 'linear-gradient(45deg, ' + vc1 + ' 0%, ' + vc1 + ' 1%, ' + gradient + ' 100%)';
        } else {
            var bg = vc1;
        }

        $('.business-preview iframe').contents().find('.vcard-header .event-section-title').css({ 'background': bc1 });
        $('.business-preview iframe').contents().find('.fabshare').css({ 'background': bc2 });
        $('.business-preview iframe').contents().find('.event-slim-button').css({ 'color': bc2 });

        $('.vcard-preview iframe').contents().find('.vcard-header').css({ 'background': bg });
        $('.vcard-preview iframe').contents().find('#saveContact .fabshare').css({ 'background': vc2 });

        $('.social-media-preview iframe').contents().find('.event-section-title').css({ 'background': c1 });
        $('.social-media-preview iframe').contents().find('.fabshare').css({ 'background': c2 });
        $('.social-media-preview iframe').contents().find('.avatar-container').css({ 'background-color': circleColor });
        $('.custom-image-border.color-selected div').css('background-color', circleColor);
        $('#banner_color').val(circleColor);
    });

    $('#formly_qrinput_title').on('keyup', function() {
        var text = $(this).val();
        $('.social-media-preview iframe').contents().find('.event-title').text(text);
    });

    $('#formly_qrinput_textarea_teaser').on('keyup', function() {
        var text = $(this).val();
        $('.social-media-preview iframe').contents().find('.event-teaser').text(text);
    });

    $('#share_button').change(function() {

        if ($(this).is(':checked')) {
            $('.social-media-preview iframe').contents().find('#shareFab').show();
        } else {
            $('.social-media-preview iframe').contents().find('#shareFab').hide();
        }

    });

    $('#vcard_share_button').change(function() {

        if ($(this).is(':checked')) {
            $('.vcard-preview iframe').contents().find('.fixed-button--share-button #shareFab').show();
        } else {
            $('.vcard-preview iframe').contents().find('.fixed-button--share-button #shareFab').hide();
        }

    });

    $('#checkbox_show_gradient').change(function() {

        var c1 = $('#vcard_primary_color').val();
        var gradient = $('#vcard_gradient').val();

        if ($(this).is(':checked')) {
            $('#gradient_color_box').show();
            var bg = 'linear-gradient(45deg, ' + c1 + ' 0%, ' + c1 + ' 1%, ' + gradient + ' 100%)';
        } else {
            $('#gradient_color_box').hide();
            var bg = c1;
        }

        $('.vcard-preview iframe').contents().find('.vcard-header').css({ 'background': bg });
    });

    $('.custom-image-border').click(function() {

        $('.custom-image-border').removeClass('color-selected');
        $(this).addClass('color-selected');

        $('.custom-color-container').removeClass('show-custom-color');
        $(this).next('.custom-color-container').addClass('show-custom-color');

        var image = $(this).find('div').css("mask-image");
        var bgColor = $(this).find('div').css("background-color");

        var imgUrl = image.replace(/(?:^url\(["']?|["']?\)$)/g, "");
        var imgArray = image.replace(/(?:^url\(["']?|["']?\)$)/g, "").split('/');
        var fileName = imgArray[imgArray.length - 1];
        $('#existing_banner').val(fileName);
        $('#is_custom_banner').val(0);

        $('.social-media-preview iframe').contents().find('.avatar-container').css({ 'background': '', '-webkit-mask-image': 'url(' + imgUrl + ')', 'background-color': bgColor });

    });

    $('.custom-colors-square').click(function() {

        var bgColor = $(this).css("background-color");
        $('.custom-image-border.color-selected div').css('background-color', bgColor);

        $('.social-media-preview iframe').contents().find('.avatar-container').css({ 'background-color': bgColor });

        $('#banner_color').val(bgColor);

    });


    $('.textareacount').keydown(function() {
        var val = $(this).val();
        $('.originalTextareaInfo span').text(val.length);
    });

    $('.additional-button').click(function() {
        var type = $(this).attr('type');
        if (type == 1) {
            $('#apiAddress').hide();
            $('#fullAddress').show();
            $(this).attr('type', 2);
            $(this).text('Reset address');
        } else {
            $('#apiAddress').show();
            $('#fullAddress').hide();
            $(this).attr('type', 1);
            $(this).text('Enter address');

            $('#street_address').val('');
            $('#city').val('');
            $('#state').val('');
            $('#country').val('');
            $('#zipcode').val('');
            $('#number').val('');
            $('#address').val('');
            $('#latitude').val('');
            $('#longitude').val('');
        }
    });

    $('.additional-business-button').click(function() {
        var type = $(this).attr('type');
        if (type == 1) {
            $('#businessapiAddress').hide();
            $('#businessfullAddress').show();
            $(this).attr('type', 2);
            $(this).text('Reset address');

        } else {
            $('#businessapiAddress').show();
            $('#businessfullAddress').hide();
            $(this).attr('type', 1);
            $(this).text('Enter address');

            $('#business_street_address').val('');
            $('#business_city').val('');
            $('#business_state').val('');
            $('#business_country').val('');
            $('#business_zipcode').val('');
            $('#business_number').val('');
            $('#business_address').val('');
            $('#business_latitude').val('');
            $('#business_longitude').val('');

            $('.business-preview iframe').contents().find('#address_box').hide();

        }
    });

    $(document).on('click', '.features-container li i', function() {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $('#feature_icons' + $(this).attr('key')).prop('checked', false);
        } else {
            $('#feature_icons' + $(this).attr('key')).prop('checked', true);
            $(this).addClass('active');
        }

        var html = '';

        $(".features-container li i.active").each(function(index, value) {
            html += '<li><i class="' + $(value).attr('class') + '"></i></li>';
        });

        if (html) {
            $('.business-preview iframe').contents().find('#features-container').show();
            $('.business-preview iframe').contents().find('.features-container').html(html);
        } else {
            $('.business-preview iframe').contents().find('#features-container').hide();
        }

        // var feature_icons = $("input[name='feature_icons[]']:checked")
        //     .map(function() { return $(this).val(); }).get();

        // console.log('feature_icons', feature_icons);

    });

    $(document).on('keyup change', '#businessfullAddress input', function() {
        var street_address = $('#business_street_address').val();
        var city = $('#business_city').val();
        var state = $('#business_state').val();
        var country = $('#business_country').val();
        var zipcode = $('#business_zipcode').val();
        var number = $('#business_number').val();

        if (street_address) {
            $('.business-preview iframe').contents().find('#street_address_h4').show();
            $('.business-preview iframe').contents().find('#street_address_h4').text(street_address);
        } else {
            $('.business-preview iframe').contents().find('#street_address_h4').hide();
        }
        if (city) {
            $('.business-preview iframe').contents().find('#city_h4').show();
            $('.business-preview iframe').contents().find('#city_h4').text(city);
        } else {
            $('.business-preview iframe').contents().find('#city_h4').hide();
        }
        if (state) {
            $('.business-preview iframe').contents().find('#state_h4').show();
            $('.business-preview iframe').contents().find('#state_h4').text(state);
        } else {
            $('.business-preview iframe').contents().find('#state_h4').hide();
        }
        if (zipcode) {
            $('.business-preview iframe').contents().find('#zipcode_h4').show();
            $('.business-preview iframe').contents().find('#zipcode_h4').html(',' + zipcode);
        } else {
            $('.business-preview iframe').contents().find('#zipcode_h4').hide();
        }
        if (country) {
            $('.business-preview iframe').contents().find('#country_h4').show();
            $('.business-preview iframe').contents().find('#country_h4').text(country);
        } else {
            $('.business-preview iframe').contents().find('#country_h4').hide();
        }
        if (number) {
            $('.business-preview iframe').contents().find('#number_h4').show();
            $('.business-preview iframe').contents().find('#number_h4').text(number);
        } else {
            $('.business-preview iframe').contents().find('#number_h4').hide();
        }

        if (street_address || city || state || zipcode || country) {
            $('.business-preview iframe').contents().find('#address_box').show();
        } else {
            $('.business-preview iframe').contents().find('#address_box').hide();
        }

    });

    $('.socialMediaIcons ul.channels-list li').click(function() {

        var type = $(this).attr('type');

        var _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: basUrl + "getsocialchannel",
            method: "POST",
            dataType: 'Json',
            data: {
                type: type,
                _token: _token
            },
            success: function(response) {

                $('.socialMediaIcons .channel-row').append(response.html);

                var url = $(response.html).find('input:first').attr('placeholder');
                var text = $(response.html).find('input:last').attr('placeholder');
                var title = $(response.html).find('.box-label span:first').text();
                var icon = $(response.html).find('.channel-bgd-' + type + ' i').attr('class');

                // var channel = response.channel;
                // channel = $(channel).find('.channel-bgd-' + type + ' i').addClass(icon);

                // if (type == 'website') {
                //     channel = $(channel).find('.channel-name').text(title);
                //     channel = $(channel).find('.channel-label').text(text);
                // } else {
                //     channel = $(channel).find('.channel-name').text(text);
                //     channel = $(channel).find('.channel-label').text(url);
                // }


                $('.social-media-preview iframe').contents().find('#devent-details').append(response.channel);

                $('.social-media-preview iframe').contents().find('#devent-details [random="' + response.random + '"] .channel-bgd-' + type + ' i').addClass(icon);

                if (type == 'website') {
                    $('.social-media-preview iframe').contents().find('#devent-details [random="' + response.random + '"] .channel-name').text(text);
                    $('.social-media-preview iframe').contents().find('#devent-details [random="' + response.random + '"] .channel-label').text(url);
                } else {
                    $('.social-media-preview iframe').contents().find('#devent-details [random="' + response.random + '"] .channel-name').text(title);
                    $('.social-media-preview iframe').contents().find('#devent-details [random="' + response.random + '"] .channel-label').text(text);
                }


                $('.btn-help-icon').tooltip();

            }
        })

    });

    $('.vCardsocialMediaIcons ul.channels-list li').click(function() {

        var type = $(this).attr('type');

        var _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: basUrl + "getvcardsocialchannel",
            method: "POST",
            dataType: 'Json',
            data: {
                type: type,
                _token: _token
            },
            success: function(response) {

                $('.vCardsocialMediaIcons .channel-row').append(response.html);

                $('.vcard-preview iframe').contents().find('#socialmedialinksContainer').show();

                var url = $(response.html).find('input:first').attr('placeholder');
                var text = $(response.html).find('input:last').attr('placeholder');
                var title = $(response.html).find('.box-label span:first').text();
                var icon = $(response.html).find('.channel-bgd-' + type + ' i').attr('class');

                $('.vcard-preview iframe').contents().find('#socialmedialinksContainer .channels-list').append(response.channel);

                $('.vcard-preview iframe').contents().find('#socialmedialinksContainer .channels-list [random="' + response.random + '"] .channel-bgd-' + type + ' i').addClass(icon);

                // $('.vcard-preview iframe').contents().find('#socialmedialinksContainer .channels-list a [random="' + response.random + '"] .channel-name').text(title);
                // $('.vcard-preview iframe').contents().find('#devent-details [random="' + response.random + '"] .channel-label').text(text);


                $('.btn-help-icon').tooltip();

            }
        })

    });

    $('.businessSocialMediaIcons ul.channels-list li').click(function() {

        var type = $(this).attr('type');

        var _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: basUrl + "getbusinesssocialchannel",
            method: "POST",
            dataType: 'Json',
            data: {
                type: type,
                _token: _token
            },
            success: function(response) {

                $('.business-preview iframe').contents().find('#social-icons').show();

                $('.businessSocialMediaIcons .channel-row').append(response.html);

                $('.business-preview iframe').contents().find('#socialmedialinksContainer').show();

                var url = $(response.html).find('input:first').attr('placeholder');
                var text = $(response.html).find('input:last').attr('placeholder');
                var title = $(response.html).find('.box-label span:first').text();
                var icon = $(response.html).find('.channel-bgd-' + type + ' i').attr('class');

                $('.business-preview iframe').contents().find('#social-icons .row').append(response.channel);

                $('.business-preview iframe').contents().find('#social-icons .row [random="' + response.random + '"] .channel-bgd-' + type + ' i').addClass(icon);

                $('.btn-help-icon').tooltip();

            }
        })

    });

    $(document).on('keyup', '.channelText', function() {
        var text = $(this).val();
        var rand = $(this).parents('.channels-container').attr('random');
        var type = $(this).parents('.channels-container').attr('type');

        if (type == 'website') {
            $('.social-media-preview iframe').contents().find('#devent-details [random="' + rand + '"] .channel-name').text(text);
        } else {
            $('.social-media-preview iframe').contents().find('#devent-details [random="' + rand + '"] .channel-label').text(text);
        }

    });

    $(document).on('keyup', '.channelName', function() {
        var text = $(this).val();
        var rand = $(this).parents('.channels-container').attr('random');
        var type = $(this).parents('.channels-container').attr('type');

        $('.social-media-preview iframe').contents().find('#devent-details [random="' + rand + '"] .channel-label').text(text);

    });

    $(document).on('click', '.socialMediaIcons .control-remove .fa-times', function() {
        var rand = $(this).parents('.channels-container').attr('random');
        $(this).parents('.channels-container').remove();
        $('.social-media-preview iframe').contents().find('#devent-details [random="' + rand + '"]').remove();
    });

    $(document).on('click', '.vCardsocialMediaIcons .control-remove .fa-times', function() {
        var rand = $(this).parents('.channels-container').attr('random');
        $(this).parents('.channels-container').remove();
        $('.vcard-preview iframe').contents().find('#socialmedialinksContainer .channels-list [random="' + rand + '"]').remove();
    });

    $(document).on('click', '.businessSocialMediaIcons .control-remove .fa-times', function() {
        var rand = $(this).parents('.channels-container').attr('random');
        $(this).parents('.channels-container').remove();
        $('.business-preview iframe').contents().find('#social-icons .row [random="' + rand + '"]').remove();
    });

    $(document).on('click', '.socialMediaIcons .control-arrange i', function() {
        var parentDiv = $(this).parents('.channels-container'),
            dir = $(this).attr('sort');
        var rand = $(this).parents('.channels-container').attr('random');

        var parentIframeDiv = $('.social-media-preview iframe').contents().find('#devent-details [random="' + rand + '"]');

        if (dir === 'up') {
            parentDiv.insertBefore(parentDiv.prev());
            parentIframeDiv.insertBefore(parentIframeDiv.prev());
        } else if (dir === 'down') {
            parentDiv.insertAfter(parentDiv.next());
            parentIframeDiv.insertAfter(parentIframeDiv.next());
        }
    });

    $(document).on('click', '.vCardsocialMediaIcons .control-arrange i', function() {
        var parentDiv = $(this).parents('.channels-container'),
            dir = $(this).attr('sort');
        var rand = $(this).parents('.channels-container').attr('random');

        // console.log(rand);

        var parentIframeDiv = $('.vcard-preview iframe').contents().find('#socialmedialinksContainer .channels-list [random="' + rand + '"]');

        if (dir === 'up') {
            parentDiv.insertBefore(parentDiv.prev());
            parentIframeDiv.insertBefore(parentIframeDiv.prev());
        } else if (dir === 'down') {
            parentDiv.insertAfter(parentDiv.next());
            parentIframeDiv.insertAfter(parentIframeDiv.next());
        }
    });

    $(document).on('click', '.businessSocialMediaIcons .control-arrange i', function() {
        var parentDiv = $(this).parents('.channels-container'),
            dir = $(this).attr('sort');
        var rand = $(this).parents('.channels-container').attr('random');

        var parentIframeDiv = $('.business-preview iframe').contents().find('#social-icons .row  [random="' + rand + '"]');

        if (dir === 'up') {
            parentDiv.insertBefore(parentDiv.prev());
            parentIframeDiv.insertBefore(parentIframeDiv.prev());
        } else if (dir === 'down') {
            parentDiv.insertAfter(parentDiv.next());
            parentIframeDiv.insertAfter(parentIframeDiv.next());
        }
    });

    $(document).on('keyup change', '.BusinessInformations input, .BusinessInformations textarea', function() {

        var business_company = $('#business_company').val();
        var business_headline = $('#business_headline').val();
        var business_summary = $('#business_summary').val();
        var business_button_text = $('#business_button_text').val();
        var business_button_lnk = $('#business_button_lnk').val();

        var business_about = $('#business_about').val();
        var business_contact_name = $('#business_contact_name').val();
        var business_phone = $('#business_phone').val();
        var business_email = $('#business_email').val();
        var business_website_link = $('#business_website_link').val();

        if (business_company) {
            $('.business-preview iframe').contents().find('.top-bar-desktop').show();
            $('.business-preview iframe').contents().find('.event-content-container .event-title').text(business_company);
        } else {
            $('.business-preview iframe').contents().find('.top-bar-desktop').hide();
        }
        $('.business-preview iframe').contents().find('.event-section-title .event-tagline').text(business_headline);
        $('.business-preview iframe').contents().find('.event-section-title .event-teaser').text(business_summary);
        $('.business-preview iframe').contents().find('.event-action-btn').text(business_button_text);
        $('.business-preview iframe').contents().find('.event-action-btn').attr('href', business_button_lnk);

        if (business_contact_name == '' && business_phone == '' && business_email == '' && business_website_link == '') {
            $('.business-preview iframe').contents().find('#contact-info').hide();
        } else {
            $('.business-preview iframe').contents().find('#contact-info').show();
        }

        if (business_about) {
            $('.business-preview iframe').contents().find('#about').show();
            $('.business-preview iframe').contents().find('#about h4').text(business_about);
        } else {
            $('.business-preview iframe').contents().find('#about').hide();
        }

        if (business_contact_name) {
            $('.business-preview iframe').contents().find('#name').show();
            $('.business-preview iframe').contents().find('#name h4').text(business_contact_name);
        } else {
            $('.business-preview iframe').contents().find('#name').hide();
        }

        if (business_phone) {
            $('.business-preview iframe').contents().find('#phone').show();
            $('.business-preview iframe').contents().find('#phone h4 a').text(business_phone);
            $('.business-preview iframe').contents().find('#phone h4 a').attr('href', 'tel:' + business_phone);
        } else {
            $('.business-preview iframe').contents().find('#phone').hide();
        }

        if (business_email) {
            $('.business-preview iframe').contents().find('#email').show();
            $('.business-preview iframe').contents().find('#email h4 a').text(business_email);
            $('.business-preview iframe').contents().find('#email h4 a').attr('href', 'mailto:' + business_email);
        } else {
            $('.business-preview iframe').contents().find('#email').hide();
        }

        if (business_website_link) {
            $('.business-preview iframe').contents().find('#website').show();
            $('.business-preview iframe').contents().find('#website h4 a').text(business_website_link);
            $('.business-preview iframe').contents().find('#website h4 a').attr('href', business_website_link);
        } else {
            $('.business-preview iframe').contents().find('#website').hide();
        }


    });

    $(document).on('click', '.time-list li a', function() {
        var text = $(this).text();
        $(this).closest('.input-group').find("input").val(text);
    });



    $(document).on('click', '.add-time-range', function() {
        var html = $(this).parents('.qr-time-range-clone').clone();
        $(html).find('.day-range-button-div').html('<button type="button" class="btn remove-time-range"><span class="fa fa-minus"></span></button>');
        $(this).parents('.qr-time-range-clone').after(html);
        $(this).prop('disabled', true);
    });

    $(document).on('click', '.remove-time-range', function() {
        $(this).parents('.qr-time-range-list').find('.add-time-range').prop('disabled', false);
        $(this).parents('.qr-time-range-clone').remove();
    });

    $(document).on('change', '.day-range-checkbox [type="checkbox"]', function() {
        var val = $(this).val();
        if ($(this).is(":checked")) {
            $('#day_range_' + val).find('input').prop('disabled', false);
            $('#day_range_' + val).find('.input-group').removeClass('disabled');
            $('#day_range_' + val).find('.input-group-addon').removeClass('disabled');
        } else {
            $('#day_range_' + val).find('input').prop('disabled', true);
            $('#day_range_' + val).find('.input-group').addClass('disabled');
            $('#day_range_' + val).find('.input-group-addon').addClass('disabled');
        }
    });

    $(document).on('change click', '.day-range-section .day-range-checkbox [type="checkbox"], .day-range-section [type="text"], .day-range-section .add-time-range, .day-range-section .remove-time-range, .day-range-section .time-list li a', function() {

        var openingHourHtml = '';
        var isOpen = 0;

        $('.day-range-section .day-range-checkbox [type="checkbox"]').each(function(i) {

            var val = $(this).val();

            openingHourHtml += '<div class="row mb-5 text-muted">' +
                '<div class="col-xs-4">' +
                '<h4  style="white-space: nowrap;text-transform: capitalize;" class=" open-hours--not-active">' + val + '</h4>' +
                '</div>' +
                '<div class="col-xs-8">';

            if ($(this).is(":checked")) {

                var opentime = $("input[name='open_time[" + val + "]']")
                    .map(function() { return $(this).val(); }).get();

                var closetime = $("input[name='closing_time[" + val + "]']")
                    .map(function() { return $(this).val(); }).get();

                $.each(opentime, function(index, value) {
                    openingHourHtml += '<div>' +
                        '<h4  style="white-space: nowrap;" class=" open-hours--not-active">' +
                        '' + value + ' - ' + closetime[index] +
                        '</h4>' +
                        '</div>';
                });

                isOpen = 1;

            } else {
                openingHourHtml += '<div>' +
                    '<h4  style="white-space: nowrap;" class=" open-hours--not-active">' +
                    'Closed' +
                    '</h4>' +
                    '</div>';
            }

            openingHourHtml += '</div>' +
                '</div>';

            // console.log(val + ':-' + opentime + ' - ' + closetime);

        });

        if (isOpen == 1) {
            $('.business-preview iframe').contents().find('#opening_hours_section').show();
            $('.business-preview iframe').contents().find('#opening_hours_box').html(openingHourHtml);
        } else {
            $('.business-preview iframe').contents().find('#opening_hours_section').hide();
        }



    });

    $('.buttonSelection li a.buttonLink').click(function() {
        var text = $(this).text();
        $('#business_button_text').val(text);
        $('.business-preview iframe').contents().find('.event-action-btn').text(text);
    });

    $('.buttonSelection li.customedit a').click(function() {
        $('#business_button_text').focus().select();
    });

    $('.removeMenuButton').click(function() {
        $('#businessMenuButtons .box-input').hide();
        $('#businessMenuButtons #AddBusinessButtonDiv').show();
        $('.business-preview iframe').contents().find('.event-action-btn').hide();
    });

    $('.AddBusinessButton').click(function() {
        $('#businessMenuButtons .box-input').show();
        $('#businessMenuButtons #AddBusinessButtonDiv').hide();
        $('.business-preview iframe').contents().find('.event-action-btn').show();
    });

    $(document).on('keyup change', '.vcardInformations input, .vcardInformations textarea', function() {

        var first_name = $('#first_name').val();
        var last_name = $('#last_name').val();
        var mobile_number = $('#mobile_number').val();
        var home_phone = $('#home_phone').val();
        var fax_number = $('#fax_number').val();
        var email = $('#email').val();
        var company = $('#company').val();
        var your_job = $('#your_job').val();
        var address = $('#address').val();
        var street_address = $('#street_address').val();
        var number = $('#number').val();
        var city = $('#city').val();
        var state = $('#state').val();
        var zipcode = $('#zipcode').val();
        var country = $('#country').val();
        var latitude = $('#latitude').val();
        var longitude = $('#longitude').val();
        var website_link = $('#website_link').val();
        var summary = $('#summary').val();
        var avtarImage = $('#avtarImage').val();
        var is_direction_show = $('input[name="is_direction_show"]:checked').val();

        // console.log('is_direction_show', is_direction_show);

        // $('.vcard-preview iframe').contents().find('[field="' + field.name + '"]').text(field.value);

        if (first_name || last_name || company) {
            // console.log('main');
            if (mobile_number || home_phone || email || city || street_address || zipcode || country || company || summary || website_link) {

                // console.log('multi');

                $('.vcard-preview iframe').contents().find('#vcardLoader').hide();
                $('.vcard-preview iframe').contents().find('#vcardLoader .sk-three-bounce').hide();

                $('.vcard-preview iframe').contents().find('#company_box').hide();
                $('.vcard-preview iframe').contents().find('#address_box').hide();

                if (first_name == '' && last_name == '' && company) {
                    $('.vcard-preview iframe').contents().find('#first_name').hide();
                    $('.vcard-preview iframe').contents().find('#last_name').hide();
                    $('.vcard-preview iframe').contents().find('.company').show();
                    $('.vcard-preview iframe').contents().find('.company').text(company);
                    $('.vcard-preview iframe').contents().find('#company_box').show();
                } else {
                    $('.vcard-preview iframe').contents().find('#first_name').show();
                    $('.vcard-preview iframe').contents().find('#last_name').show();
                    $('.vcard-preview iframe').contents().find('.company').hide();
                    $('.vcard-preview iframe').contents().find('#first_name').text(first_name);
                    $('.vcard-preview iframe').contents().find('#last_name').text(last_name);
                }

                if (company && (first_name || last_name)) {
                    $('.vcard-preview iframe').contents().find('#company_box').show();
                    $('.vcard-preview iframe').contents().find('.company').hide();
                    $('.vcard-preview iframe').contents().find('.company_h4').show();
                    $('.vcard-preview iframe').contents().find('.company_h4').text(company);
                } else {
                    $('.vcard-preview iframe').contents().find('.company_h4').hide();
                }
                if (your_job) {
                    $('.vcard-preview iframe').contents().find('#company_box').show();
                    $('.vcard-preview iframe').contents().find('.your_job').text(your_job);
                } else {
                    $('.vcard-preview iframe').contents().find('.your_job').text('');
                }
                if (mobile_number) {
                    $('.vcard-preview iframe').contents().find('#mobile_number').show();
                    $('.vcard-preview iframe').contents().find('#mobile_number h4 a').text(mobile_number);
                    $('.vcard-preview iframe').contents().find('#mobile_number h4 a').attr('href', 'tel:' + mobile_number);
                } else {
                    $('.vcard-preview iframe').contents().find('#mobile_number').hide();
                }
                if (home_phone) {
                    $('.vcard-preview iframe').contents().find('#home_phone').show();
                    $('.vcard-preview iframe').contents().find('#home_phone h4 a').text(home_phone);
                    $('.vcard-preview iframe').contents().find('#home_phone h4 a').attr('href', 'tel:' + home_phone);
                } else {
                    $('.vcard-preview iframe').contents().find('#home_phone').hide();
                }
                if (mobile_number || home_phone) {
                    $('.vcard-preview iframe').contents().find('#is_mobile_number').show();
                } else {
                    $('.vcard-preview iframe').contents().find('#is_mobile_number').hide();
                }
                if (email) {
                    $('.vcard-preview iframe').contents().find('#email').show();
                    $('.vcard-preview iframe').contents().find('#is_email').show();

                    $('.vcard-preview iframe').contents().find('#email h4 a').text(email);
                    $('.vcard-preview iframe').contents().find('#email h4 a').attr('href', 'mailto:' + email);

                } else {
                    $('.vcard-preview iframe').contents().find('#email').hide();
                    $('.vcard-preview iframe').contents().find('#is_email').hide();
                }
                if (fax_number) {
                    $('.vcard-preview iframe').contents().find('#fax_number').show();
                    $('.vcard-preview iframe').contents().find('#fax_number h4').text(fax_number);
                } else {
                    $('.vcard-preview iframe').contents().find('#fax_number').hide();
                }
                if (is_direction_show && street_address) {
                    $('.vcard-preview iframe').contents().find('#is_direction_show').show();
                } else {
                    $('.vcard-preview iframe').contents().find('#is_direction_show').hide();
                }
                if (summary) {
                    $('.vcard-preview iframe').contents().find('#summary').show();
                    $('.vcard-preview iframe').contents().find('#summary').text(summary);
                } else {
                    $('.vcard-preview iframe').contents().find('#summary').hide();
                }

                if (website_link) {
                    $('.vcard-preview iframe').contents().find('#website_link').show();
                    $('.vcard-preview iframe').contents().find('#website_link h4 a').attr('href', website_link);
                    $('.vcard-preview iframe').contents().find('#website_link h4 a').text(website_link);
                } else {
                    $('.vcard-preview iframe').contents().find('#website_link').hide();
                }

                if (street_address) {
                    $('.vcard-preview iframe').contents().find('#street_address_h4').show();
                    $('.vcard-preview iframe').contents().find('#street_address_h4').text(street_address);
                    $('#direction_show_box').show();
                } else {
                    $('.vcard-preview iframe').contents().find('#street_address_h4').hide();
                    $('#direction_show_box').hide();
                }
                if (city) {
                    $('.vcard-preview iframe').contents().find('#city_h4').show();
                    $('.vcard-preview iframe').contents().find('#city_h4').text(city);
                } else {
                    $('.vcard-preview iframe').contents().find('#city_h4').hide();
                }
                if (state) {
                    $('.vcard-preview iframe').contents().find('#state_h4').show();
                    $('.vcard-preview iframe').contents().find('#state_h4').text(state);
                } else {
                    $('.vcard-preview iframe').contents().find('#state_h4').hide();
                }
                if (zipcode) {
                    $('.vcard-preview iframe').contents().find('#zipcode_h4').show();
                    $('.vcard-preview iframe').contents().find('#zipcode_h4').html(',' + zipcode);
                } else {
                    $('.vcard-preview iframe').contents().find('#zipcode_h4').hide();
                }
                if (country) {
                    $('.vcard-preview iframe').contents().find('#country_h4').show();
                    $('.vcard-preview iframe').contents().find('#country_h4').text(country);
                } else {
                    $('.vcard-preview iframe').contents().find('#country_h4').hide();
                }
                if (number) {
                    $('.vcard-preview iframe').contents().find('#number_h4').show();
                    $('.vcard-preview iframe').contents().find('#number_h4').text(number);
                } else {
                    $('.vcard-preview iframe').contents().find('#number_h4').hide();
                }

                if (street_address || city || state || zipcode || country) {
                    $('.vcard-preview iframe').contents().find('#address_box').show();
                } else {
                    $('.vcard-preview iframe').contents().find('#address_box').hide();
                }

                if (avtarImage) {
                    $('.vcard-preview iframe').contents().find('#avtarImage').show();
                } else {
                    $('.vcard-preview iframe').contents().find('#avtarImage').hide();
                }


            } else {

                // console.log(first_name, last_name);
                if (first_name) {
                    $('.vcard-preview iframe').contents().find('#first_name').show();
                    $('.vcard-preview iframe').contents().find('#first_name').text(first_name);
                } else {
                    $('.vcard-preview iframe').contents().find('#first_name').hide();
                }
                if (last_name) {
                    $('.vcard-preview iframe').contents().find('#last_name').show();
                    $('.vcard-preview iframe').contents().find('#last_name').text(last_name);
                } else {
                    $('.vcard-preview iframe').contents().find('#last_name').hide();
                }

                if (your_job) {
                    $('.vcard-preview iframe').contents().find('.your_job').text(your_job);
                } else {
                    $('.vcard-preview iframe').contents().find('.your_job').text('');
                }

                $('.vcard-preview iframe').contents().find('#is_mobile_number').hide();
                $('.vcard-preview iframe').contents().find('#is_email').hide();
                $('.vcard-preview iframe').contents().find('#is_direction_show').hide();
                $('.vcard-preview iframe').contents().find('#summary').hide();
                $('.vcard-preview iframe').contents().find('#mobile_number').hide();
                $('.vcard-preview iframe').contents().find('#home_phone').hide();
                $('.vcard-preview iframe').contents().find('#fax_number').hide();
                $('.vcard-preview iframe').contents().find('#email').hide();
                $('.vcard-preview iframe').contents().find('#company_box').hide();
                $('.vcard-preview iframe').contents().find('#address_box').hide();
                $('.vcard-preview iframe').contents().find('#website_link').hide();


                if (avtarImage) {
                    $('.vcard-preview iframe').contents().find('#avtarImage').show();
                } else {
                    $('.vcard-preview iframe').contents().find('#avtarImage').hide();
                }

                $('.vcard-preview iframe').contents().find('#vcardLoader').show();
                $('.vcard-preview iframe').contents().find('#vcardLoader .sk-three-bounce').show();


            }
        }


        // var formData = $('#vCardPlusForm').serializeArray();

        // console.log(formData);

        // $.each(formData, function(index, field) {

        //     if (field.value == '') {
        //         $('.vcard-preview iframe').contents().find('[field="' + field.name + '"]').hide();
        //     } else {
        //         $('.vcard-preview iframe').contents().find('[field="' + field.name + '"]').show();
        //     }

        // });

    });

    $(".welcomeImage, .croppreviewimage, .changeWelcomeImage").click(function() {
        $("input[id='welcome_image']").click();
    });

    var $modal = $('#modal');
    var image = document.getElementById('cropimage');
    var cropper;
    $("body").on("change", "#welcome_image", function(e) {
        var files = e.target.files;
        var done = function(url) {
            image.src = url;
            $modal.modal({
                show: true,
                backdrop: 'static',
                keyboard: false
            });
        };
        var reader;
        var file;
        var url;
        if (files && files.length > 0) {
            file = files[0];
            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function(e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });
    $modal.on('shown.bs.modal', function() {
        cropper = new Cropper(image, {
            // aspectRatio: 1,
            viewMode: 1,
            preview: '.croppreview'
        });
    }).on('hidden.bs.modal', function() {
        cropper.destroy();
        cropper = null;
    });
    $("#crop").click(function() {
        canvas = cropper.getCroppedCanvas({
            width: 160,
            height: 160,
        });
        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;

                var _token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: basUrl + "crop-image-upload",
                    data: { '_token': _token, 'image': base64data },
                    success: function(data) {
                        // console.log(data);
                        $modal.modal('hide');
                        $('.croppreviewimage img').attr('src', base64data);
                        $('.croppreviewimage').show();
                        $('#welcomeLogo').val(data.fileName);
                        // alert("Crop image successfully uploaded");
                    }
                });
            }
        });
    });

    //vcard welcome logo cropper

    $(".vcardwelcomeImage, .cardwelcomecroppreviewimage, .changevcardwelcomeImage").click(function() {
        $("input[id='vcard_welcome_image']").click();
    });

    var $vcardwelcomemodal = $('#vcard_welcome_modal');
    var vcardwelcomecropimage = document.getElementById('vcardwelcomecropimage');
    var vcardwelcomecropper;
    $("body").on("change", "#vcard_welcome_image", function(e) {
        var files = e.target.files;
        var done = function(url) {
            vcardwelcomecropimage.src = url;
            $vcardwelcomemodal.modal({
                show: true,
                backdrop: 'static',
                keyboard: false
            });
        };
        var reader;
        var file;
        var url;
        if (files && files.length > 0) {
            file = files[0];
            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function(e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });
    $vcardwelcomemodal.on('shown.bs.modal', function() {
        vcardwelcomecropper = new Cropper(vcardwelcomecropimage, {
            // aspectRatio: 1,
            viewMode: 1,
            preview: '.vcardwelcomecroppreview'
        });
    }).on('hidden.bs.modal', function() {
        vcardwelcomecropper.destroy();
        vcardwelcomecropper = null;
    });
    $("#vcardwelcomecrop").click(function() {
        canvas = vcardwelcomecropper.getCroppedCanvas({
            width: 160,
            height: 160,
        });
        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;

                var _token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: basUrl + "crop-image-upload",
                    data: { '_token': _token, 'image': base64data },
                    success: function(data) {
                        // console.log(data);
                        $vcardwelcomemodal.modal('hide');
                        $('.cardwelcomecroppreviewimage img').attr('src', base64data);
                        $('.cardwelcomecroppreviewimage').show();
                        $('#vcardwelcomeLogo').val(data.fileName);
                        // alert("Crop image successfully uploaded");
                    }
                });
            }
        });
    });

    //Busibess welcome logo cropper

    $(".businesswelcomeImage, .businesswelcomecroppreviewimage, .changebusinesswelcomeImage").click(function() {
        $("input[id='business_welcome_image']").click();
    });

    var $businesswelcomemodal = $('#business_welcome_modal');
    var businesswelcomecropimage = document.getElementById('businesswelcomecropimage');
    var businesswelcomecropper;
    $("body").on("change", "#business_welcome_image", function(e) {
        var files = e.target.files;
        var done = function(url) {
            businesswelcomecropimage.src = url;
            $businesswelcomemodal.modal({
                show: true,
                backdrop: 'static',
                keyboard: false
            });
        };
        var reader;
        var file;
        var url;
        if (files && files.length > 0) {
            file = files[0];
            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function(e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });
    $businesswelcomemodal.on('shown.bs.modal', function() {
        businesswelcomecropper = new Cropper(businesswelcomecropimage, {
            // aspectRatio: 1,
            viewMode: 1,
            preview: '.businesswelcomecroppreview'
        });
    }).on('hidden.bs.modal', function() {
        businesswelcomecropper.destroy();
        businesswelcomecropper = null;
    });
    $("#businesswelcomecrop").click(function() {
        canvas = businesswelcomecropper.getCroppedCanvas({
            width: 160,
            height: 160,
        });
        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;

                var _token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: basUrl + "crop-image-upload",
                    data: { '_token': _token, 'image': base64data },
                    success: function(data) {
                        // console.log(data);
                        $businesswelcomemodal.modal('hide');
                        $('.businesswelcomecroppreviewimage img').attr('src', base64data);
                        $('.businesswelcomecroppreviewimage').show();
                        $('#businesswelcomeLogo').val(data.fileName);
                        // alert("Crop image successfully uploaded");
                    }
                });
            }
        });
    });

    // avtar image cropper

    function getRoundedCanvas(sourceCanvas) {
        var canvas = document.createElement('canvas');
        var context = canvas.getContext('2d');
        var width = sourceCanvas.width;
        var height = sourceCanvas.height;

        canvas.width = width;
        canvas.height = height;
        context.imageSmoothingEnabled = true;
        context.drawImage(sourceCanvas, 0, 0, width, height);
        context.globalCompositeOperation = 'destination-in';
        context.beginPath();
        context.arc(width / 2, height / 2, Math.min(width, height) / 2, 0, 2 * Math.PI, true);
        context.fill();
        return canvas;
    }

    $(".croppreviewimagevcrad, .uploadAvtarImage").click(function() {
        $("input[id='vcard_avtar_image']").click();
    });

    var $avtarmodal = $('#avtarmodal');
    var vcardimage = document.getElementById('cropimagevcard');
    var vcardcropper;
    $("body").on("change", "#vcard_avtar_image", function(e) {
        var files = e.target.files;
        var done = function(url) {
            vcardimage.src = url;
            $avtarmodal.modal({
                show: true,
                backdrop: 'static',
                keyboard: false
            });
        };
        var reader;
        var file;
        var url;
        if (files && files.length > 0) {
            file = files[0];
            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function(e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });
    $avtarmodal.on('shown.bs.modal', function() {
        vcardcropper = new Cropper(vcardimage, {
            // aspectRatio: 1,
            viewMode: 1,
            preview: '.croppreviewvcard'
        });
    }).on('hidden.bs.modal', function() {
        vcardcropper.destroy();
        vcardcropper = null;
    });
    $("#vcardcrop").click(function() {
        var roundedCanvas;
        canvas = vcardcropper.getCroppedCanvas({
            width: 95,
            height: 95,
        });

        // Round
        roundedCanvas = getRoundedCanvas(canvas);

        roundedCanvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;

                $avtarmodal.modal('hide');
                var _token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: basUrl + "crop-image-upload",
                    data: { '_token': _token, 'image': base64data },
                    success: function(data) {
                        // console.log(data);
                        $avtarmodal.modal('hide');
                        $('.croppreviewimagevcrad').css('background', 'url(' + base64data + ')');
                        $('.no-event-image-selected').hide();
                        $('#avtarImage').val(data.fileName);
                        $('.vcard-preview iframe').contents().find('.vcard-top-info .img').css({ 'background': 'url(' + base64data + ')' });
                        $('.vcard-preview iframe').contents().find('#avtarImage').show();
                        // alert("Crop image successfully uploaded");
                    }
                });
            }
        });
    });
    // avtar image cropper

    $('.uploadOwn').click(function() {
        $('#UploadCustomImage').slideToggle().show("slow");
        $('.photos-gallery').slideToggle().hide("slow");
        $('.customImageText').slideToggle().hide("slow");

        var bannerImage = $('#bannerImage').val();

        if (bannerImage) {
            $('#is_custom_banner').val(1);
        } else {
            $('.social-media-preview iframe').contents().find('.avatar-container').hide("slow");
        }

        $('#existing_banner').val('');
        $('#banner_color').val('');

    });

    $('.browseImage').click(function() {
        $('.photos-gallery').slideToggle().show("slow");
        $('#UploadCustomImage').slideToggle().hide("slow");
        $('.customImageText').slideToggle().show("slow");
        var bannerImage = $('#bannerImage').val();

        var image = $('.custom-image-border.color-selected').find('div').css('mask-image');
        var bgColor = $('.custom-image-border.color-selected').find('div').css("background-color");

        var imgUrl = image.replace(/(?:^url\(["']?|["']?\)$)/g, "");
        var imgArray = image.replace(/(?:^url\(["']?|["']?\)$)/g, "").split('/');
        var fileName = imgArray[imgArray.length - 1];

        $('#existing_banner').val(fileName);
        $('#banner_color').val(bgColor);

        if (bannerImage) {
            $('#is_custom_banner').val(1);
        } else {
            $('#is_custom_banner').val(0);
        }
        $('.social-media-preview iframe').contents().find('.avatar-container').show("slow");
    });

    $(".uploadImageText, .uploadBannerImage, .cropcustompreviewImage").click(function() {
        $("input[id='banner_image']").click();
    });

    var $custommodal = $('#customImagemodal');
    var customimage = document.getElementById('cropcustomimage');
    var customcropper;
    $("body").on("change", "#banner_image", function(e) {
        var files = e.target.files;
        var done = function(url) {
            customimage.src = url;
            $custommodal.modal({
                show: true,
                backdrop: 'static',
                keyboard: false
            });
        };
        var reader;
        var file;
        var url;
        if (files && files.length > 0) {
            file = files[0];
            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function(e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });
    var minCroppedWidth = 320;
    var minCroppedHeight = 180;
    var maxCroppedWidth = 640;
    var maxCroppedHeight = 360;

    $custommodal.on('shown.bs.modal', function() {
        customcropper = new Cropper(customimage, {
            // aspectRatio: 1,
            viewMode: 1,
            preview: '.cropcustompreview',
            // data: {
            //     width: (minCroppedWidth + maxCroppedWidth) / 2,
            //     height: (minCroppedHeight + maxCroppedHeight) / 2,
            // },
            // crop: function(event) {
            //     var width = event.detail.width;
            //     var height = event.detail.height;

            //     if (
            //         width < minCroppedWidth ||
            //         height < minCroppedHeight ||
            //         width > maxCroppedWidth ||
            //         height > maxCroppedHeight
            //     ) {
            //         customcropper.setData({
            //             width: Math.max(minCroppedWidth, Math.min(maxCroppedWidth, width)),
            //             height: Math.max(minCroppedHeight, Math.min(maxCroppedHeight, height)),
            //         });
            //     }
            // },
        });
    }).on('hidden.bs.modal', function() {
        customcropper.destroy();
        customcropper = null;
    });
    $("#customcrop").click(function() {
        canvas = customcropper.getCroppedCanvas({
            width: 160,
            height: 160,
        });
        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;

                var _token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: basUrl + "crop-image-upload",
                    data: { '_token': _token, 'image': base64data },
                    success: function(data) {
                        // console.log(data);
                        $custommodal.modal('hide');
                        $('.cropcustompreviewImage img').attr('src', base64data);
                        $('.cropcustompreviewImage').show();
                        $('.uploadImageText').hide();
                        $('#bannerImage').val(data.fileName);
                        $('#is_custom_banner').val(1);
                        $('.social-media-preview iframe').contents().find('.avatar-container').css({ '-webkit-mask-image': '', 'background': 'url(' + base64data + ')', 'background-size': '100%', 'display': 'block' });

                        // alert("Crop image successfully uploaded");
                    }
                });
            }
        });
    });

    // business cropper

    $(".cropcustompreviewBusinessImage i").click(function() {
        $('.cropcustompreviewBusinessImage img').attr('src', '');
        $('.cropcustompreviewBusinessImage').hide();
        $('#businessBannerImage').val('');
        $('.uploadBusinessImageText').show();
        $('.business-preview iframe').contents().find('.avatar-container').hide();
        $('.business-preview iframe').contents().find('.avatar-container').css({ 'background': 'url()' });
        $('.business-preview iframe').contents().find('.blur-bgd div').css({ 'background': 'url()' });
    });

    $(".uploadBusinessImageText, .uploadBusinessBannerImage").click(function() {
        $("input[id='business_banner_image']").click();
    });

    var $businesscustommodal = $('#customBusinessImagemodal');
    var businesscustomimage = document.getElementById('cropcustomBusinessimage');
    var businesscustomcropper;
    $("body").on("change", "#business_banner_image", function(e) {
        var files = e.target.files;
        var done = function(url) {
            businesscustomimage.src = url;
            $businesscustommodal.modal({
                show: true,
                backdrop: 'static',
                keyboard: false
            });
        };
        var reader;
        var file;
        var url;
        if (files && files.length > 0) {
            file = files[0];
            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function(e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });

    $businesscustommodal.on('shown.bs.modal', function() {
        businesscustomcropper = new Cropper(businesscustomimage, {
            // aspectRatio: 1,
            viewMode: 1,
            preview: '.cropcustomBusinesspreview',

        });
    }).on('hidden.bs.modal', function() {
        businesscustomcropper.destroy();
        businesscustomcropper = null;
    });
    $("#customBusinesscrop").click(function() {
        canvas = businesscustomcropper.getCroppedCanvas({
            width: 160,
            height: 160,
        });
        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;

                var _token = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: basUrl + "crop-image-upload",
                    data: { '_token': _token, 'image': base64data },
                    success: function(data) {
                        // console.log(data);
                        $businesscustommodal.modal('hide');
                        $('.cropcustompreviewBusinessImage img').attr('src', base64data);
                        $('.cropcustompreviewBusinessImage').show();
                        $('.uploadBusinessImageText').hide();
                        $('#businessBannerImage').val(data.fileName);
                        $('.business-preview iframe').contents().find('.avatar-container').css({ 'background': 'url(' + base64data + ')', 'background-size': '100%', 'display': 'block' });

                    }
                });
            }
        });
    });


    $('#designQrModal').modal({
        show: false,
        backdrop: 'static',
        keyboard: false
    });

    function isUrlValid(userInput) {
        var res = userInput.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
        if (res == null)
            return false;
        else
            return true;
    }


    initSlider();

    function initSlider() {
        $('.photos-gallery-carousel').slick({
            infinite: false,
            slidesToShow: 2,
            slidesToScroll: 1
        });
    }


    // $('.photos-gallery-carousel').slick({
    //     centerMode: true,
    //     centerPadding: '60px',
    //     slidesToShow: 2,
    //     slidesToScroll: 1,
    //     responsive: [{
    //             breakpoint: 768,
    //             settings: {
    //                 arrows: false,
    //                 centerMode: true,
    //                 centerPadding: '40px',
    //                 slidesToShow: 3
    //             }
    //         },
    //         {
    //             breakpoint: 480,
    //             settings: {
    //                 arrows: false,
    //                 centerMode: true,
    //                 centerPadding: '40px',
    //                 slidesToShow: 1
    //             }
    //         }
    //     ]
    // });

});