// quick search regex
var qsRegex;
var buttonFilter;

// init Isotope
var $grid = $('.grid').isotope({
    itemSelector: '.element-item',
    layoutMode: 'fitRows',
    filter: function () {
        var $this = $(this);
        var searchResult = qsRegex ? $this.text().match(qsRegex) : true;
        var buttonResult = buttonFilter ? $this.is(buttonFilter) : true;
        return searchResult && buttonResult;
    }
});

$('#filters').on('click', 'button', function () {
    buttonFilter = $(this).attr('data-filter');
    $grid.isotope();
});

// use value of search field to filter
var $quicksearch = $('#quicksearch').keyup(debounce(function () {
    qsRegex = new RegExp($quicksearch.val(), 'gi');
    $grid.isotope();
}));


// change is-checked class on buttons
$('.button-group').each(function (i, buttonGroup) {
    var $buttonGroup = $(buttonGroup);
    $buttonGroup.on('click', 'button', function () {
        $buttonGroup.find('.is-checked').removeClass('is-checked');
        $(this).addClass('is-checked');
    });
});


// debounce so filtering doesn't happen every millisecond
function debounce(fn, threshold) {
    var timeout;
    threshold = threshold || 100;
    return function debounced() {
        clearTimeout(timeout);
        var args = arguments;
        var _this = this;

        function delayed() {
            fn.apply(_this, args);
        }

        timeout = setTimeout(delayed, threshold);
    };
}


(function ($) {

    'use strict';


    /* https://codepen.io/ilovepku/pen/zYYKaYy
Combination Filters
*/
    if ($('#combinationFilters').get(0)) {

        $(window).on('load', function () {

            setTimeout(function () {

                var $grid = $('.portfolio-list').isotope({
                    itemSelector: '.isotope-item',
                    layoutMode: 'masonry',
                    filter: '.grid-layout',
                    hiddenStyle: {
                        opacity: 0
                    },
                    visibleStyle: {
                        opacity: 1
                    },
                    stagger: 30,
                    isOriginLeft: ($('html').attr('dir') == 'rtl' ? false : true)
                });

                var filters = {},
                    $loader = $('.sort-destination-loader');

                $('.filters').on('click', 'a', function (e) {

                    e.preventDefault();

                    var $this = $(this);

                    var $buttonGroup = $this.parents('.portfolio-filter-group');
                    var filterGroup = $buttonGroup.attr('data-filter-group');


                    filters[filterGroup] = $this.parent().attr('data-option-value');

                    var filterValue = concatValues(filters);

                    $grid.isotope({
                        filter: filterValue
                    });
                });

                $('.portfolio-filter-group').each(function (i, buttonGroup) {
                    var $buttonGroup = $(buttonGroup);
                    $buttonGroup.on('click', 'a', function () {
                        $buttonGroup.find('.active').removeClass('active');
                        $(this).parent().addClass('active');
                        $(this).addClass('active');
                    });
                });

                var concatValues = function (obj) {
                    var value = '';
                    for (var prop in obj) {
                        value += obj[prop];
                    }
                    return value;
                }

                $(window).on('resize', function () {
                    setTimeout(function () {
                        $grid.isotope('layout');
                        //$list.isotope('layout');
                    }, 300);


                });

                if ($loader) {
                    $loader.removeClass('sort-destination-loader-showing');

                    setTimeout(function () {
                        $loader.addClass('sort-destination-loader-loaded');
                    }, 500);
                }

            }, 1000);

        });

    }
}).apply(this, [jQuery]);