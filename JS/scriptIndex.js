
// Active isotope with jQuery code:

var $grid = $('.main-iso').isotope({
	itemSelector: '.item',
	layoutMode: 'masonry'
});

// layout Isotope after each image loads
$grid.imagesLoaded().progress( function() {
  $grid.isotope('layout');
});  


// Isotope click function
$('.iso-nav ul li').click(function(){
	$('.iso-nav ul li').removeClass('active');
	$(this).addClass('active');

	var selector = $(this).attr('data-filter');
	$('.main-iso').isotope({
		filter: selector
	}); 
	return false;
});




//function navBar() {
//    var x = document.getElementById("myTopnav");
//    if (x.className === "topnav") {
//        x.className += " responsive";
//    } else {
//        x.className = "topnav";
//    }
//}





