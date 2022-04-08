 document.querySelectorAll('oembed[url]').forEach(element => {

     const anchor = document.createElement('a');

     anchor.setAttribute('href', element.getAttribute('url'));
     anchor.className = 'embedly-card';

     element.appendChild(anchor);
 });

 function isEven(num) {
     if (num !== false && num !== true && !isNaN(num)) {
         return num % 2 == 0;
     } else {
         return false;
     }
 }

 function fullWidth(elementName, containerWidth) {

     //     console.log("=======================================================");
     //     console.log("%c INSIDE FULLWIDTH() ", 'background: #000; color: yellow');

     var window_width = $(window).width();
     // console.log("window_width: " + window_width);
     var containerWidth = $('[class*="body"]').width();
     // console.log("containerWidth: " + containerWidth);

     // Determine whether to round up or not for odd widths
     if (isEven(window_width) !== false) {
         var left_margin = -((window_width - containerWidth) / 2);
     } else {
         var left_margin = -(Math.ceil((window_width - containerWidth) / 2));
     }

     if (window_width > containerWidth) {
         elementName.width(window_width).css({ marginLeft: left_margin });

     } else if (window_width < containerWidth) {
         elementName.css({ width: '100%' }, { marginLeft: '0' });
     }
     widthHorz = $(window).width();

     $(window).bind('resize', function(e) {
         if (widthHorz != $(window).width()) {
             var new_window_width = $(window).width();
             // Determine whether to round up or not for odd widths
             if (isEven(new_window_width) !== false) {
                 var new_left_margin = -((new_window_width - containerWidth) / 2);
             } else {
                 var new_left_margin = -(Math.ceil((new_window_width - containerWidth) / 2));
             }

             if (new_window_width > containerWidth) {
                 elementName.width(new_window_width).css({ marginLeft: new_left_margin });

             } else if (new_window_width < containerWidth) {
                 elementName.css({ width: '100%' }, { marginLeft: '0' });

             } else {
                 elementName.css({ width: '100%' }, { marginLeft: '0' });
             }
         }
     });
 }

 function fullWidthRun() {
     var site_width = $(window).width();
     var current_body = $('body');
     // fullWidth($('.full-width-section'), site_width);
     fullWidth($('[class*="full-width-section"]'), site_width);
     fullWidth($('[class*="full-width-row"]'), site_width);
     // fullWidth($("[class*='full-width-section']"), site_width);
     fullWidth($("[class*='banjo']"), site_width);
     if (current_body.hasClass('cc-100')) {
         fullWidth($('[class*="full-width-section"]'), site_width);
     }

 }
 fullWidthRun();


 function fullWidthDebug() {

     // var site_width = $(window).width();
     // var current_body = $('body');
     // // fullWidth($('.full-width-section'), site_width);
     // fullWidth($('[class*="full-width-section"]'), site_width);
     // // fullWidth($("[class*='full-width-section']"), site_width);
     // fullWidth($("[class*='banjo']"), site_width);
     // if (current_body.hasClass('cc-100')) {
     //     fullWidth($('[class*="full-width-section"]'), site_width);
     // }

     // console.log("=======================================================");
     // console.log("%c INSIDE FULLWIDTHRUN() ", 'background: #000; color: yellow');

     // console.log("%c site_width: " + site_width + "px", 'background: #FFF; color: darkgreen');
     // var current_body_width = $('body').width();
     // console.log("%c current_body_width: " + current_body_width+ "px", 'background: #FFF; color: darkgreen'); 

     // var window_width = $(window).width();
     // console.log("%c window_width: " + window_width+ "px", 'background: #FFF; color: darkgreen');

     // var containerWidth = $('[class*="container"]').width();
     // console.log("%c containerWidth: " + containerWidth+ "px", 'background: #FFF; color: darkgreen');
     // console.log("=======================================================");

     // /* uncomment to debug */
     // $( "h4" ).each(function( index ) {
     //   console.log( index + ": " + $( this ).text() );
     // });
     // console.log("=======================================================");
     // console.log("%c NOT FOR A FUNCTION ONLY DEBUG VARIABLES ", 'background: #000; color: yellow');
     // console.log("%c ALL SECTIONS ON PAGE ", 'border: solid 2px red; color: #black;text-transform: uppercase;font-weight: bold;');
     // $('section').each(function( index ) {
     //   console.log( index + ": section: " + $( this ).width() + "px" );
     // });
     // console.log("%c ALL BANJO SECTIONS ON PAGE ", 'border: solid 2px red; color: #black;text-transform: uppercase;font-weight: bold;');
     // $('section.banjo').each(function( index ) {
     //   console.log( index + ": section.banjo: " + $( this ).width() + "px" );
     // });
     // console.log("%c ALL FULL-WIDTH-SECTION SECTIONS ON PAGE ", 'border: solid 2px red; color: #black;text-transform: uppercase;font-weight: bold;');
     // $('[class*="full-width-section"]').each(function( index ) {
     //   console.log( index + ": section.full-width-section: " + $( this ).width() + "px" );
     // });
 }
 // fullWidthDebug();


 $('.select2').select2();