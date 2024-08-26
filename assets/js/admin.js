$(document).ready(function(){
	$(".tag-box").click(function(){
		var tagid = $(this).attr('id');
		$(this).toggleClass("checked");
		
		var checkbox = $(".check-tags."+tagid);
		checkbox.attr("checked", !checkbox.attr("checked"));
	});

	$(".show-nav").click(function(){
		$(".sidenav-wrapper").css({"transform":"translateX(0)"});
		$("html").css({"overflow":"hidden"});
	});
	

	$(".close-nav").click(function(){
		$(".sidenav-wrapper").css({"transform":"translateX(-80rem)"});
		$("html").css({"overflow":"auto"});
	});

	$(".share-trigger").click(function(){
		var name = $(this).attr('id');
		$(".dropdown-items."+name).toggleClass('visible');
	});

	$(".errors").delay(6000).fadeOut('slow');
	$(".success").delay(6000).fadeOut('slow');

	$('.delete-user').click(function(){
		var username = $(this).data('username');
		$('.user-modal').toggleClass('d-none').toggleClass('d-flex');
		$('span.username').text(username);
		$('.delete-user-form input.username').val(username);
	})

	$('.closeuser-modal').click(function(){
		$('.user-modal').toggleClass('d-none').toggleClass('d-flex');
	});

	$('.delete-post').click(function(){
		var header = $(this).data('post');
		$('.post-modal').toggleClass('d-none').toggleClass('d-flex');
		$('span.header').text(header);
		$('.delete-post-form input.header').val(header);
	})

	$('.closepost-modal').click(function(){
		$('.post-modal').toggleClass('d-none').toggleClass('d-flex');
	});

	$('.delete-category').click(function(){
		var category = $(this).data('category');
		$('.category-modal').toggleClass('d-none').toggleClass('d-flex');
		$('span.title').text(category);
		$('.delete-category-form input.category').val(category);
	})

	$('.closecat-modal').click(function(){
		$('.category-modal').toggleClass('d-none').toggleClass('d-flex');
	});

	$('.delete-course').click(function(){
		var course = $(this).data('course');
		$('.course-modal').toggleClass('d-none').toggleClass('d-flex');
		$('span.title').text(course);
		$('.delete-course-form input.course').val(course);
	})

	$('.closecourse-modal').click(function(){
		$('.course-modal').toggleClass('d-none').toggleClass('d-flex');
	});

	$('.select-all').click(function(){
		if($('input[type="checkbox"]').attr('checked', 'checked')){
			$('input[type="checkbox"]').attr('checked', 'unchecked');
		}else if($('input[type="checkbox"]').attr('checked', 'unchecked')){
			$('input[type="checkbox"]').attr('checked', 'checked');
		}
	});
	
});
