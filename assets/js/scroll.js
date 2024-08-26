$(document).ready(function(){	
	$(window).scroll(function(){
		var scrollPosition = $(window).scrollTop();
		var stats = $('.stats-wrapper').offset().top;
		var home = $('#home').offset().top;
		var about = $('#about').offset().top;
		var services = $('#services').offset().top;
		var projects = $('#projects').offset().top;
		var percentage = $('.percentage');

		if (scrollPosition >= stats) {
			percentage.addClass('percentage-animation');
		}

		if (scrollPosition >= home) {
			$(".home--nav").addClass("active").siblings().removeClass("active");
		}

		if (scrollPosition >= about) {
			$(".about--nav").addClass("active").siblings().removeClass("active");
		}

		if (scrollPosition >= services) {
			$(".services--nav").addClass("active").siblings().removeClass("active");
		}

		if (scrollPosition >= projects) {
			$(".projects--nav").addClass("active").siblings().removeClass("active");
		}

	})
});