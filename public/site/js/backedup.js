<script>
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


// use value of search field to filter
var $quicksearch = $('.quicksearch').keyup( debounce( function() {
	qsRegex = new RegExp( $quicksearch.val(), 'gi' );
	$grid.isotope();
	$list.isotope();
}, 200 ) );
	// debounce so filtering doesn't happen every millisecond
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
	</script>

		<script>

				$('.portfolio-item').matchHeight();
					$('.grid-item').matchHeight();


		$(function () {

			// $('#press-description').matchHeight({ target: $('.press-release') });
						let $card = $(".portfolio-item");

						// $("#grid-layout-container").show();
						// $("#list-layout-container").hide();

						$('#list-layout-view').click(function (event) {
								event.preventDefault();
								$("#list-layout-container").show();
								$("#grid-layout-container").hide();
						});
						$('#grid-layout-view').click(function (event) {
								event.preventDefault();
								$("#grid-layout-container").show();
								$("#list-layout-container").hide();
						});

				});

		</script>