// Add your custom JS here.

jQuery(function($){
	
  // Smooth anchor scrolling
	$('a').click(function(){
	    $('html, body').animate({
	        scrollTop: $( $(this).attr('href') ).offset().top-120
	    }, 500);
	    return false;
	});

	$('.navbar-toggler').click(function(){
		$('#wrapper-navbar').toggleClass('open-nav');
	});


	// Slick Slider
	// $('.blog-slider').slick({
	//   centerMode: true,
	//   centerPadding: '60px',
	//   slidesToShow: 3,
	//   responsive: [
	//     {
	//       breakpoint: 768,
	//       settings: {
	//         arrows: false,
	//         centerMode: true,
	//         centerPadding: '40px',
	//         slidesToShow: 3
	//       }
	//     },
	//     {
	//       breakpoint: 480,
	//       settings: {
	//         arrows: false,
	//         centerMode: true,
	//         centerPadding: '40px',
	//         slidesToShow: 1
	//       }
	//     }
	//   ]
	// });


});


