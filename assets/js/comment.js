$(document).ready(function(){

	$(".likeCom").on('click', function(){
		var postid = $(this).attr('id');
		var commentid = $(this).attr('data-filter');
		var userid = $(this).attr('data-id');
		$post = $(".likeCom."+commentid);
		$.ajax({
			url: 'posts.php',
			type: 'post',
			data:{
				'comliked': 1,
				'post_id': postid,
				'comment_id': commentid,
				'user_id': userid
			},
			
			success: function(response){
				$post.find('span.like-count').text(response);
				$post.toggleClass('color-red-500');
				$post.toggleClass('liked');
				if($post.hasClass('liked')){
					$post.find('span svg path').attr('d', 'M240,102c0,70-103.79,126.66-108.21,129a8,8,0,0,1-7.58,0C119.79,228.66,16,172,16,102A62.07,62.07,0,0,1,78,40c20.65,0,38.73,8.88,50,23.89C139.27,48.88,157.35,40,178,40A62.07,62.07,0,0,1,240,102Z');
				}else{
					$post.find('span svg path').attr('d', 'M178,40c-20.65,0-38.73,8.88-50,23.89C116.73,48.88,98.65,40,78,40a62.07,62.07,0,0,0-62,62c0,70,103.79,126.66,108.21,129a8,8,0,0,0,7.58,0C136.21,228.66,240,172,240,102A62.07,62.07,0,0,0,178,40ZM128,214.8C109.74,204.16,32,155.69,32,102A46.06,46.06,0,0,1,78,56c19.45,0,35.78,10.36,42.6,27a8,8,0,0,0,14.8,0c6.82-16.67,23.15-27,42.6-27a46.06,46.06,0,0,1,46,46C224,155.61,146.24,204.15,128,214.8Z');
				}
			}
		});
	});

});