$(document).ready(function(){

	$('.see-password').click(function(){
		$(this).parent().find('input[type="password"]').attr('type', 'text');
		$(this).hide();
		$(this).parent().find('.unsee-password').addClass('d-flex').removeClass('d-none');
	});

	$('.unsee-password').click(function(){
		$(this).parent().find('input[type="text"]').attr('type', 'password');
		$(this).hide();
		$(this).parent().find('.see-password').show();
	});

	$('.dropdown-trigger').click(function() {
		$('.dropdown-content').addClass('p-0 h-0').removeClass('p-8 h-auto');
		$(this).parent().find('.dropdown-content').toggleClass('p-0 h-0').toggleClass('h-auto p-8');
	});

	$(document).click(function(event) {
        if (!$(event.target).closest('.dropdown').length) {
            $(this).find('.dropdown-content').addClass('p-0 h-0').removeClass('p-8 h-auto');
        }
    });

	$("#showNav").click(function(){
		$("body").toggleClass('overflow-hidden');
		$(".side-nav").css({"transform":"translateX(0rem)"});
		$('#closeNav').show();
		$(this).hide();
	});

	$("#closeNav").click(function(){
		$("body").removeClass('overflow-hidden');
		$(".side-nav").css({"transform":"translateX(-32rem)"});
		$('#showNav').show();
		$(this).hide();
	});

	$("#showNav").click(function(){
		$("body").toggleClass('overflow-hidden');
		$(".side-nav").css({"transform":"translateX(0rem)"});
		$('#closeNav').show();
		$(this).hide();
	});

	$("#closeNav").click(function(){
		$("body").removeClass('overflow-hidden');
		$(".side-nav").css({"transform":"translateX(-32rem)"});
		$('#showNav').show();
		$(this).hide();
	});

	$('.filter-item').click(function(){
		const value = $(this).attr('data-filter');
		if(value == 'all') {
			$('.blog-card-container').show('1000');
		}else{
			$('.blog-card-container').not('.' + value).hide('1000');
			$('.blog-card-container').filter('.' + value).show('1000');
		}
	});

	$(".search-trigger").click(function(){
		$(".search-wrapper").toggleClass('d-none');
		$(".search-wrapper").toggleClass('d-flex');
		$(".search-wrapper").toggleClass('w-0');
		$(".search-wrapper").toggleClass('w-48');
		$(".search-box").focus();
		$(this).hide();
		return false;
	});

	$(".search-box").blur(function(){
		$(".search-wrapper").toggleClass('d-none');
		$(".search-wrapper").toggleClass('d-flex');
		$(".search-wrapper").toggleClass('w-0');
		$(".search-wrapper").toggleClass('w-48');
		$(".search-box").focus();
		$(".search-trigger").show();
		return false;
	})

	$(".search-box").focus(function(){
		$(".search-container").toggleClass("focus");
	});

	$(".drop-trigger").on('click', function(){
		$(this).parent().find('.dropdown-items').toggleClass('visible');
	});

	$('.js-gotop').on('click', function(event){
		event.preventDefault();
		$('html, body').animate({
			scrollTop: $('html').offset().top
		}, 400, 'easeInOutExpo');
			
		return false;
	});

	$(window).scroll(function(){
		var gototop = $('.gototop');
		if ($(window).scrollTop() > 60 ) {
			gototop.removeClass('d-none').addClass('d-flex');
		}else{
			gototop.addClass('d-none').removeClass('d-flex');
		}

	});

});