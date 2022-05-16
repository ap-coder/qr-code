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
        $('.preview-smartphone-wrapper').show();
        $('.preview-qrcode').hide();
    });

    $('.qrcodetab').click(function() {
        var url = $('#UrlBarcode_url').val();
        var check = isUrlValid(url);

        $('.preview-smartphone-wrapper').hide();
        $('.preview-qrcode').show();

        if (check) {
            $('.box-input').removeClass('error');
            $('.box-input p').hide();
            $('.preview-qrcode').removeClass('barCodeError');
            $('.mockup__qrcode-error').hide();
        } else {
            $('.box-input').addClass('error');
            $('.box-input p').show();
            $('.preview-qrcode').addClass('barCodeError');
            $('.mockup__qrcode-error').show();
        }
    });

    $('.btn-generator-save-directly').click(function() {
        var url = $('#UrlBarcode_url').val();
        var check = isUrlValid(url);
        $('.ladda-label').text('');
        $('.sk-three-bounce').show();
        $(".ladda-button").prop("disabled", true);

        if (check) {
            $('.box-input').removeClass('error');
            $('.box-input p').hide();
        } else {
            $('.sk-three-bounce').hide();
            $('.box-input').addClass('error');
            $('.box-input p').show();
            $('.ladda-label').text('Next');
            $(".ladda-button").prop("disabled", false);
        }

    });

    $('.colors-list li a').click(function() {

        $('.colors-list li a').removeClass('active');
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

    $('.colorswapper').click(function() {

        var c1 = $('#primary_color').val();
        var c2 = $('#button_color').val();
        $('#primary_color').val(c2);
        $('#button_color').val(c1);
        $('#primary_color').trigger('change');
        $('#button_color').trigger('change');

        $('.social-media-preview iframe').contents().find('.event-section-title').css({ 'background': c2 });
        $('.social-media-preview iframe').contents().find('.fabshare').css({ 'background': c1 });

    });

    $('.colorpicker').on('click', function() {
        var c1 = $('#primary_color').val();
        var c2 = $('#button_color').val();
        var circleColor = $('.show-custom-color .color-picker-circle-input').val();

        $('.social-media-preview iframe').contents().find('.event-section-title').css({ 'background': c1 });
        $('.social-media-preview iframe').contents().find('.fabshare').css({ 'background': c2 });
        $('.social-media-preview iframe').contents().find('.avatar-container').css({ 'background-color': circleColor });
        $('.custom-image-border.color-selected div').css('background-color', circleColor);
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
        console.log('imgUrl', imgUrl);

        $('.social-media-preview iframe').contents().find('.avatar-container').css({ '-webkit-mask-image': 'url(' + imgUrl + ')', 'background-color': bgColor });

    });

    $('.custom-colors-square').click(function() {

        var bgColor = $(this).css("background-color");
        $('.custom-image-border.color-selected div').css('background-color', bgColor);

        $('.social-media-preview iframe').contents().find('.avatar-container').css({ 'background-color': bgColor });

    });


    $('.aboutSocialMedia').keydown(function() {

        var val = $(this).val();

        $('.originalTextareaInfo span').text(val.length);

    });

    $('ul.channels-list li').click(function() {

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

                $('.social-media-preview iframe').contents().find('#devent-details').append(response.channel);

                $('.channel-row').append(response.html);
                $('.btn-help-icon').tooltip();

            }
        })

    });

    $(document).on('click', '.control-remove .fa-times', function() {
        $(this).parents('.channels-container').remove();
    });

    $(document).on('click', '.control-arrange i', function() {
        var parentDiv = $(this).parents('.channels-container'),
            dir = $(this).attr('sort');

        if (dir === 'up') {
            parentDiv.insertBefore(parentDiv.prev())
        } else if (dir === 'down') {
            parentDiv.insertAfter(parentDiv.next())
        }
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
                        console.log(data);
                        $modal.modal('hide');
                        $('.croppreviewimage img').attr('src', base64data);
                        $('.croppreviewimage').show();
                        // alert("Crop image successfully uploaded");
                    }
                });
            }
        });
    })


    function isUrlValid(userInput) {
        var res = userInput.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g);
        if (res == null)
            return false;
        else
            return true;
    }

    $('.photos-gallery-carousel').slick({
        infinite: false,
        slidesToShow: 2,
        slidesToScroll: 1
    });

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