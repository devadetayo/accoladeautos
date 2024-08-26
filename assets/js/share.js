$(document).ready(function(){
	$('#copy-link').click(function(){
		var link = $(this).find('span').data('link');
		var $temp = $('<input>');
		$('body').append($temp);
		$temp.val(link).select();
		document.execCommand('copy');
		$temp.remove();
		var $message = $('#copy-message');
		$message.text('Link copied to clipboard!');

		$message.fadeIn().delay(3000).fadeOut();
	});

	$('.copy-link').click(function(){
		var link = $(this).find('span').data('link');
		var $temp = $('<input>');
		$('body').append($temp);
		$temp.val(link).select();
		document.execCommand('copy');
		$temp.remove();
		var $message = $('#copy-message');
		$message.text('Link copied to clipboard!');

		$message.fadeIn().delay(3000).fadeOut();
	});

});