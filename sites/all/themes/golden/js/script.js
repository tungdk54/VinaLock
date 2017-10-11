jQuery(document).ready(function($){
	/*active Main menu*/
	var url = window.location.pathname;
	var activePage = url.substring(url.lastIndexOf('/')+1);

	$('.submenu-horizontal ul.menu li a').each(function(){
	var currentPage = this.href.substring(this.href.lastIndexOf('/')+1);
	if (activePage == currentPage) {
	  $(this).parent().addClass('active');
	}
	});

	//Back to top
	// $(window).scroll(function(){
	// 	if ($(this).scrollTop() > 100) {
	// 		$('.scrollToTop').fadeIn();
	// 	} else {
	// 		$('.scrollToTop').fadeOut();
	// 	}
	// });
	//Click event to scroll to top
	// $('.scrollToTop').click(function(){
	// 	$('html, body').animate({scrollTop : 0},400);
	// 	return false;
	// });

  //Fix main menu on top
	var nav = $('#navbar');
	var height_of_bannertop = $('.top-header').outerHeight();

	$(window).scroll(function () {
		if ($(this).scrollTop() > height_of_bannertop) {
			nav.addClass("fixed-top");
		} else {
			nav.removeClass("fixed-top");
		}
	});

	var height_of_screen = $(window).height();
	var height_of_body = $('body').height();
	console.log(height_of_screen + '-----' + height_of_body);
	var footer = $('footer');

	$(window).scroll(function () {
		if (height_of_body < height_of_screen) {
			footer.addClass("fixed-bottom");
		} else {
			footer.removeClass("fixed-bottom");
		}
	});

	$('a.image').on('click', function() {
		$('.imagepreview').attr('src', $(this).find('img').attr('src'));
		$('#imagemodal').modal('show');   
	});

});