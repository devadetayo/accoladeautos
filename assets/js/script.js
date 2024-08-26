

// On year change, fetch and populate brands
$('#yearDropdown').change(function() {
	var yearId = $(this).val();

	// Reset brand, model, and parts dropdowns
	$('#brandDropdown').empty().append('<option value="">Select a Brand</option>').prop('disabled', true);
	$('#modelDropdown').empty().append('<option value="">Select a Model</option>').prop('disabled', true);
	$('#partsDropdown').empty().append('<option value="">Select a Part</option>').prop('disabled', true);

	if (yearId) {
		$.ajax({
			url: 'get_brands.php',
			method: 'GET',
			data: { year_id: yearId },
			dataType: 'json',
			success: function(data) {
				$('#brandDropdown').prop('disabled', false);
				$.each(data, function(index, brand) {
					$('#brandDropdown').append($('<option>', {
						value: brand.id,
						text: brand.brand_name
					}));
				});
			}
		});
	}
});

// On brand change, fetch and populate models
$('#brandDropdown').change(function() {
	var brandId = $(this).val();

	// Reset model and parts dropdowns
	$('#modelDropdown').empty().append('<option value="">Select a Model</option>').prop('disabled', true);
	$('#partsDropdown').empty().append('<option value="">Select a Part</option>').prop('disabled', true);

	if (brandId) {
		$.ajax({
			url: 'get_models.php',
			method: 'GET',
			data: { brand_id: brandId },
			dataType: 'json',
			success: function(data) {
				$('#modelDropdown').prop('disabled', false);
				$.each(data, function(index, model) {
					$('#modelDropdown').append($('<option>', {
						value: model.id,
						text: model.model_name
					}));
				});
			}
		});
	}
});

// On model change, fetch and populate parts
$('#modelDropdown').change(function() {
	var modelId = $(this).val();

	// Reset parts dropdown
	$('#partsDropdown').empty().append('<option value="">Select a Part</option>').prop('disabled', true);

	if (modelId) {
		$.ajax({
			url: 'get_parts.php',
			method: 'GET',
			data: { model_id: modelId },
			dataType: 'json',
			success: function(data) {
				$('#partsDropdown').prop('disabled', false);
				$.each(data, function(index, part) {
					$('#partsDropdown').append($('<option>', {
						value: part.id,
						text: part.part_name
					}));
				});
			}
		});
	}
});