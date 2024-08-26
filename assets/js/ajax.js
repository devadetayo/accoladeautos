$(document).ready(function(){

	$('.selected-brand .select-item').on('click', function(){

		var brandId = $(this).data('value'); // Update hidden input

		// Fetch models via AJAX based on selected brand
		$.ajax({
			url: '/accoladeautos/app/pages/get-models.php',
			type: 'GET',
			data: { 
				'brand_id': brandId 
			},
			dataType: 'json',
			success: function(response) {
				const modelOptions = $('#model-options');
				modelOptions.empty(); // Clear existing options

				modelOptions.append(`<span class="select-item d-flex w-full py-8 px-12 bg-white dark:bg-slate-800  hover:bg-slate-100 hover:color-black dark:hover:bg-slate-700 dark:hover:color-white" data-value="" data-index="0" role="option" tabindex="-1">Select a model</span>`);

				if (response.models && response.models.length > 0) {
					$.each(response.models, function(index, model) {
						modelOptions.append(`<span class="select-item d-flex w-full py-8 px-12 bg-white dark:bg-slate-800  hover:bg-slate-100 hover:color-black dark:hover:bg-slate-700 dark:hover:color-white" data-value="${model.id}" data-index="${index + 1}" role="option" tabindex="-1">${model.model_name}</span>`);
					});
				} else {
					modelOptions.append('<span class="select-item d-flex w-full py-8 px-12 bg-white dark:bg-slate-800  hover:bg-slate-100 hover:color-black dark:hover:bg-slate-700 dark:hover:color-white" data-value="" data-index="0" role="option" tabindex="-1">No models available</span>');
				}
			}
		});
	});

	$('.selected-brand .select-item').on('click', function(){

		var modelId = $(this).data('value'); // Update hidden input

		// Fetch models via AJAX based on selected brand
		$.ajax({
			url: '/accoladeautos/app/pages/get-parts.php',
			type: 'GET',
			data: { 
				'model_id': modelId 
			},
			dataType: 'json',
			success: function(response) {
				const partOptions = $('#parts-options');
				partOptions.empty(); // Clear existing options

				partOptions.append(`<span class="select-item d-flex w-full py-8 px-12 bg-white dark:bg-slate-800  hover:bg-slate-100 hover:color-black dark:hover:bg-slate-700 dark:hover:color-white" data-value="" data-index="0" role="option" tabindex="-1">Select a part category</span>`);

				if (response.parts && response.parts.length > 0) {
					$.each(response.parts, function(index, part) {
						partOptions.append(`<span class="select-item d-flex w-full py-8 px-12 bg-white dark:bg-slate-800  hover:bg-slate-100 hover:color-black dark:hover:bg-slate-700 dark:hover:color-white" data-value="${part.id}" data-index="0" role="option" tabindex="-1">${part.part_type_name}</span>`);
					});
				} else {
					partOptions.append('<span class="select-item d-flex w-full py-8 px-12 bg-white dark:bg-slate-800  hover:bg-slate-100 hover:color-black dark:hover:bg-slate-700 dark:hover:color-white" data-value="" data-index="0" role="option" tabindex="-1">No models available</span>');
				}
			}
		});
	});

	$(document).on('click', '.increment-btn', function() {
        let partId = $(this).data('part-id');
        let quantityElement = $(this).closest('.increment-card').find('.quantity-value');
		let quantityInput = $(this).closest('.increment-card').find('.quantity-input');
        let currentQuantity = parseInt(quantityElement.text());

        $.ajax({
            url: '/accoladeautos/app/pages/update_cart.php',
            type: 'POST',
            dataType: 'json',
            data: {
                'part_id': partId,
                'action': 'increment'
            },
            success: function(response) {
                if (response.success) {
                    quantityElement.text(currentQuantity + 1);
					quantityInput.val(currentQuantity + 1);
                }
            }
        });
    });

    // Handle the decrement button click
    $(document).on('click', '.decrement-btn', function() {
        let partId = $(this).data('part-id');
        let quantityElement = $(this).closest('.increment-card').find('.quantity-value');
        let quantityInput = $(this).closest('.increment-card').find('.quantity-input');
        let currentQuantity = parseInt(quantityElement.text());

        if (currentQuantity > 1) {
            $.ajax({
                url: '/accoladeautos/app/pages/update_cart.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    'part_id': partId,
                    'action': 'decrement'
                },
                success: function(response) {
                    if (response.success) {
                        quantityElement.text(currentQuantity - 1);
						quantityInput.val(currentQuantity - 1);
                    }
                }
            });
        }
    });

    // Handle the remove button click
    $(document).on('click', '.remove-item-btn', function() {
        let partId = $(this).data('id');
        let cardElement = $(this).closest('.cart-card');

        $.ajax({
            url: '/accoladeautos/app/pages/update_cart.php',
            type: 'POST',
            dataType: 'json',
            data: {
                'part_id': partId,
                'action': 'remove'
            },
            success: function(response) {
                if (response.success) {
                    cardElement.remove();
					$('#copy-message').text(response.message).fadeIn().delay(3000).fadeOut();
                    $('.cart-count').text(response.cartItemCount);
                }
            }
        });
    });

	$('#clear-cart-btn').on('click', function() {
        $.ajax({
            url: '/accoladeautos/app/pages/update_cart.php',
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'clear_cart'
            },
            success: function(response) {
                if (response.success) {
                    // Update the cart count and notify the user
                    $('#copy-message').text(response.message).fadeIn().delay(3000).fadeOut();
					$('.cart-container .cart-empty').addClass('d-flex').removeClass('d-none');
					$('.cart-container .cart-items').addClass('d-none').removeClass('d-flex');

                    if($('.cart-container .cart-empty').hasClass('d-none')){
						$('.cart-container .cart-empty').addClass('d-flex').removeClass('d-none');
					}else if($('.cart-container .cart-items').hasClass('d-flex')){
						$('.cart-container .cart-items').addClass('d-none').removeClass('d-flex');
					}

                    $('.cart-count').text('0');
                } else {
                    $('#copy-message').text(response.message).fadeIn().delay(3000).fadeOut();
                }
            },
        });
    });
    

	$('.add-to-cart-btn').on('click', function() {
		let partId = $(this).data('id');
		let quantity = $(this).closest('.cart-box').find('.increment-card .quantity-input').val();
	
		$.ajax({
			type: "POST",
			url: "/accoladeautos/app/pages/update_cart.php",
			data: {
				part_id: partId,
				quantity: quantity,
				action: 'add'  // Ensure 'add' action is sent
			},
			dataType: "json",
			success: function(response) {
				if (response.success) {
					$('.cart-container .cart-items').addClass('d-flex').removeClass('d-none');
					$('.cart-container .cart-empty').addClass('d-none').removeClass('d-flex');

                    if($('.cart-container .cart-items').hasClass('d-none')){
						$('.cart-container .cart-items').addClass('d-flex').removeClass('d-none');
					}else if($('.cart-container .cart-empty').hasClass('d-flex')){
						$('.cart-container .cart-empty').addClass('d-none').removeClass('d-flex');
					}
					$('.cart-count').text(response.cartItemCount);
					$('#copy-message').text(response.message).fadeIn().delay(3000).fadeOut();
				} else {
					$('#copy-message').text(response.message).fadeIn().delay(3000).fadeOut();
				}
			}
		});
	});

	$('.open-cart').click(function(){

	});

});