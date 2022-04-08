


// var $grid = $('.grid').packery({
//   itemSelector: '.grid-item'
// });


// $grid.on( 'click', '.grid-item', function( event ) {
//   // change size of item by toggling large class
//   $(  event.currentTarget  ).toggleClass('grid-item--large');
//   // trigger layout after item size changes
//   $grid.packery('layout');
// });




$('.portfolio-filter-group a, a#list-layout-view, a#grid-layout-view, .products-list-view a').css('cursor', 'pointer');

var filters = {},
$grid = $('div[class*="grid"]');
$list = $('div[class*="list"]');

$('#categoryDropdown, #popularityStuffDropdown, #statusDropdown, #searchFilter').on('change', function(e) {
	var $this = $(this);

	var filterGroup = $this.data('filter-group');

	filters[filterGroup] = $this.val();

	var filterValue = concatValues(filters);
	console.log(filters);

	$grid.isotope({
		isOriginLeft: true,
		filter: filterValue
	});

	$list.isotope({
		isOriginLeft: false,
		filter: filterValue
	});

});

$('.portfolio-filter-group a').on('click', function(e){
	e.preventDefault();

	$('.portfolio-filter-group a').removeClass('active');
	$('.portfolio-filter-group li').removeClass('active');

	var $this = $(this);

	var filterGroup = $this.data('filter-group');

	filters[filterGroup] = $this.parent().data('option-value');

	var filterValue = concatValues(filters);

	$grid.isotope({
		filter: filterValue
	});

	$list.isotope({
		filter: filterValue
	});

	$this.addClass('active');
	$this.parent().addClass('active');
});

function concatValues(obj){
	var value = '';
	for (var prop in obj) {
		value += obj[prop];
	}
	return value;
}

// $(window).smartresize(function(){
//   	$grid.isotope({
//     		masonry: { columnWidth: $container.width() / 5 }
//   	});
// });


var qsRegex;
// init Isotope
var $grid = $('div[class*="grid"]').isotope({
	itemSelector: '.grid-item',
	layoutMode: 'fitRows',
	filter: function() {
		return qsRegex ? $(this).text().match( qsRegex ) : true;
	}
});

var $list = $('div[class*="list"]').isotope({
	itemSelector: '.list-item',
	layoutMode: 'fitRows',
	filter: function() {
		return qsRegex ? $(this).text().match( qsRegex ) : true;
	}
});

var $quicksearch = $('.quicksearch').keyup( debounce( function() {
	qsRegex = new RegExp( $quicksearch.val(), 'gi' );
	$grid.isotope();

}, 200 ) );

var $quicksearch = $('.quicksearch').keyup( debounce( function() {
	qsRegex = new RegExp( $quicksearch.val(), 'gi' );

	$list.isotope();
}, 200 ) );


function debounce( fn, threshold ) {
	var timeout;
	threshold = threshold || 100;
	return function debounced() {
		clearTimeout( timeout );
		var args = arguments;
		var _this = this;
		function delayed() {
			fn.apply( _this, args );
		}
		timeout = setTimeout( delayed, threshold );
	};
}



// $('.portfolio-item').matchHeight();
// $('.grid-item').matchHeight();

// $("#list-layout-container").hide();
// $(function () {});
// $('#press-description').matchHeight({ target: $('.press-release') });

// let $card = $(".portfolio-item");
// $("#grid-layout-container").show();
// $("#list-layout-container").hide();
$('#list-layout-view').click(function (event)
{
		event.preventDefault();
		$("#list-layout-container").show();
		$("#grid-layout-container").hide();
});

$('#grid-layout-view').click(function (event)
{
		event.preventDefault();
		$("#grid-layout-container").show();
		$("#list-layout-container").hide();
});









//     $('.portfolio-filter-group a, a#list-layout-view, a#grid-layout-view, .products-list-view a').css('cursor', 'pointer');
//     var filters = {},
//     $grid = $('.portfolio-list');
// $('#categoryDropdown, #popularityStuffDropdown, #statusDropdown #searchFilter').on('change', function(e) {
//     var $this = $(this);
//     var filterGroup = $this.data('filter-group');
//     filters[filterGroup] = $this.val();
//     var filterValue = concatValues(filters);
//     $grid.isotope({
//         filter: filterValue
//     });
// });
// $('.portfolio-filter-group a').on('click', function(e){
//     e.preventDefault();
//     $('.portfolio-filter-group a').removeClass('active');
//     $('.portfolio-filter-group li').removeClass('active');
//     var $this = $(this);
//     var filterGroup = $this.data('filter-group');
//     filters[filterGroup] = $this.parent().data('option-value');
//     var filterValue = concatValues(filters);
//     $grid.isotope({
//         filter: filterValue
//     });
//     $this.addClass('active');
//     $this.parent().addClass('active');
// });
// function concatValues(obj){
//     var value = '';
//     for (var prop in obj) {
//         value += obj[prop];
//     }
//     return value;
// }



// var filters = {},
//     $grid = $('.portfolio-list');

// $('#categoryDropdown, #popularityStuffDropdown').on('change', function(e) {
//     var $this = $(this);

//     var filterGroup = $this.data('filter-group');

//     filters[filterGroup] = $this.val();

//     var filterValue = concatValues(filters);

//     $grid.isotope({
//         filter: filterValue
//     });
// });

// function concatValues(obj){
//     var value = '';
//     for (var prop in obj) {
//         value += obj[prop];
//     }
//     return value;
// }
