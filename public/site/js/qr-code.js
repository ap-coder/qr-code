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
            url: basUrl + "qrcode/getTypePreview",
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

    });

    $('.colorswapper').click(function() {

        var c1 = $('#primary_color').val();
        var c2 = $('#button_color').val();
        $('#primary_color').val(c2);
        $('#button_color').val(c1);
        $('#primary_color').trigger('change');
        $('#button_color').trigger('change');

    });

    $('.custom-image-border').click(function() {

        $('.custom-image-border').removeClass('color-selected');
        $(this).addClass('color-selected');

        $('.custom-color-container').removeClass('show-custom-color');
        $(this).next('.custom-color-container').addClass('show-custom-color');

    });

    $('.custom-colors-square').click(function() {

        var color = $(this).css("background-color");
        $('.custom-image-border.color-selected div').css('background-color', color);

    });

    $('.aboutSocialMedia').keydown(function() {

        var val = $(this).val();

        $('.originalTextareaInfo span').text(val.length);

    });

    $('ul.channels-list li').click(function() {

        var type = $(this).attr('type');

        var _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: basUrl + "qrcode/getsocialchannel",
            method: "POST",
            dataType: 'Json',
            data: {
                type: type,
                _token: _token
            },
            success: function(response) {

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

    // $('.color-picker-circle-input').change(function() {

    //     var color = $(this).val();
    //     alert(color);
    //     $('.custom-image-border.color-selected div').css('background-color', color);

    // });

    // $("#myaddoncolor").on("propertychange change click keyup input paste", function() {
    //     alert();
    // });

    // $('#primary_color').change(function() {
    //     alert();
    //     // $('.colors-list li a').removeClass('active');

    // });

    // $('#button_color').blur(function() {

    //     $('.colors-list li a').removeClass('active');

    // });






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