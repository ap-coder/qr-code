(function($) {

    $('.list-grid-icon').click(function() {
        $('.quick-search').val('');
        $('#categoryDropdown').prop('selectedIndex', 0);
        //$('#statusDropdown').prop('selectedIndex', 0);
    });

    var filters = {},
        $grid = $('.portfolio-list.row'),
        $list = $('.list.products');

    if ($('#combinationFilters').get(0)) {
        $(window).on('load', function() {
            setTimeout(function() {
                var statusDrop = $('#statusDropdown').val();
                //console.log('statusDrop', statusDrop);

                var $grid = $('.portfolio-list').isotope({
                    itemSelector: '.isotope-item',
                    layoutMode: 'masonry',
                    filter: statusDrop + '.grid-layout',
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

                $('.filters').on('click', 'a', function(e) {
                    e.preventDefault();
                    var $this = $(this);
                    var $buttonGroup = $this.parents('.portfolio-filter-group');
                    var filterGroup = $buttonGroup.attr('data-filter-group');
                    filters[filterGroup] = $this.parent().attr('data-option-value');
                    var filterValue = concatValues(filters);
                    // console.log('filterValue111', filterValue);
                    // console.log('filterValue', filterValue);
                    // console.log('value', $this.parent().attr('data-option-value'));
                    var statusDrop = $('#statusDropdown').val();

                    if ($this.parent().attr('data-option-value') == '.grid-layout' || $this.parent().attr('data-option-value') == '.list-layout') {

                        if ($('.load-grid').hasClass('active')) {
                            $('#list-layout-container').hide();
                            $('#grid-layout-container').show();
                            $grid.isotope({
                                filter: statusDrop + filterValue
                            });
                        } else {
                            $('#grid-layout-container').hide();
                            $('#list-layout-container').show();
                            $list.isotope({
                                filter: statusDrop + filterValue
                            });
                        }
                    } else {
                        if ($('.load-grid').hasClass('active')) {
                            $('#list-layout-container').hide();
                            $('#grid-layout-container').show();
                            $grid.isotope({
                                filter: statusDrop + filterValue + '.grid-layout'
                            });
                        } else {
                            $('#grid-layout-container').hide();
                            $('#list-layout-container').show();
                            $list.isotope({
                                filter: statusDrop + filterValue + '.list-layout'
                            });
                        }
                    }


                });

                $('.portfolio-filter-group').each(function(i, buttonGroup) {
                    var $buttonGroup = $(buttonGroup);
                    $buttonGroup.on('click', 'a', function() {
                        $buttonGroup.find('.active').removeClass('active');
                        $(this).parent().addClass('active');
                        $(this).addClass('active');
                    });
                });
                var concatValues = function(obj) {
                    var value = '';
                    for (var prop in obj) {
                        value += obj[prop];
                    }
                    return value;
                }
                $(window).on('resize', function() {
                    setTimeout(function() {
                        $grid.isotope('layout');
                    }, 300);
                });
                if ($loader) {
                    $loader.removeClass('sort-destination-loader-showing');
                    setTimeout(function() {
                        $loader.addClass('sort-destination-loader-loaded');
                    }, 500);
                }
            }, 1000);
            $('.layout-filter-group a').on('click', function(e) {
                e.preventDefault();
                $('.layout-filter-group li').removeClass('active');
                $('.layout-filter-group a').removeClass('active');
                var $this = $(this);
                var filterGroup = $this.closest('.nav').data('filter-group');
                filters[filterGroup] = $this.parent().data('option-value');
                var filterValue = concatValues(filters);
                // console.log('222', filterValue);
                var statusDrop = $('#statusDropdown').val();
                if ($('.load-grid').hasClass('active')) {
                    $('#list-layout-container').hide();
                    $('#grid-layout-container').show();
                    $grid.isotope({
                        filter: statusDrop + filterValue
                    });
                } else {
                    $('#grid-layout-container').hide();
                    $('#list-layout-container').show();
                    $list.isotope({
                        filter: statusDrop + filterValue
                    });
                }

                $this.addClass('active');
                $this.parent().addClass('active');
            });
            $('#categoryDropdown, #typeDropdown, #popularityStuffDropdown, #statusDropdown, #searchFilter').on('change', function(e) {
                e.preventDefault();
                var $this = $(this);
                var filterGroup = $this.data('filter-group');
                filters[filterGroup] = $this.val();
                var filterValue = concatValues(filters);
                // console.log(filterValue);

                if ($('.load-grid').hasClass('active')) {
                    $('#list-layout-container').hide();
                    $('#grid-layout-container').show();
                    $grid.isotope({
                        filter: filterValue
                    });
                } else {
                    $('#grid-layout-container').hide();
                    $('#list-layout-container').show();
                    $list.isotope({
                        filter: filterValue
                    });
                }
            });
            $('.quick-search').on('keyup', debounce(function() {
                var qsRegex;
                var qsRegex = new RegExp($('.quick-search').val(), 'gi');
                var $this = $(this);
                var filterGroup = $this.data('filter-group');
                filters[filterGroup] = $this.val() !== '' ? '.' + $this.val() : '';
                var filterValue = concatValues(filters);

                // console.log(filterValue);


                if ($('.load-grid').hasClass('active')) {
                    $('#list-layout-container').hide();
                    $('#grid-layout-container').show();
                    $grid.isotope({
                        layoutMode: 'fitRows',
                        filter: function() {
                            return filterValue ? $(this).text().match(qsRegex) : true;
                        }
                    });
                } else {
                    $('#grid-layout-container').hide();
                    $('#list-layout-container').show();
                    $list.isotope({
                        layoutMode: 'fitRows',
                        filter: function() {
                            return filterValue ? $(this).text().match(qsRegex) : true;
                        }
                    });
                }
            }, 200));
            $('.portfolio-filter-group a').on('click', function(e) {
                e.preventDefault();
                $('.portfolio-filter-group a').removeClass('active');
                $('.portfolio-filter-group li').removeClass('sort-destination-loader-loaded');
                var $this = $(this);
                var filterGroup = $this.closest('.nav').data('filter-group');
                filters[filterGroup] = $this.parent().data('option-value');
                var filterValue = concatValues(filters);


                if ($('.load-grid').hasClass('active')) {
                    $('#list-layout-container').hide();
                    $('#grid-layout-container').show();
                    $grid.isotope({
                        filter: filterValue
                    });
                } else {
                    $('#grid-layout-container').hide();
                    $('#list-layout-container').show();
                    $list.isotope({
                        filter: filterValue
                    });
                }
                $this.addClass('active');
                $this.parent().addClass('active');
            });
        });

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

        function concatValues(obj) {
            var value = '';
            for (var prop in obj) {
                value += obj[prop];
            }
            return value;
        }
    }
}).apply(this, [jQuery]);