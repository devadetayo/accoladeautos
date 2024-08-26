$(document).ready(function() {
    $('#changeImg').click(function() {
        $('#coverImg').click();
    });

    $('#profileDisplay').on('click', function() {
        $('#coverImg').click();
    });

    let dropArea = $('#img-placehold');

    // Prevent default drag behaviors
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropArea.on(eventName, function(e) {
            e.preventDefault();
            e.stopPropagation();
        });
    });

    // Highlight drop area when item is dragged over it
    ['dragenter', 'dragover'].forEach(eventName => {
        dropArea.on(eventName, function() {
            dropArea.addClass('highlight');
        });
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropArea.on(eventName, function() {
            dropArea.removeClass('highlight');
        });
    });

    // Handle dropped files
    dropArea.on('drop', function(e) {
        let dt = e.originalEvent.dataTransfer;
        let files = dt.files;

        handleFiles(files);
        $('#coverImg').prop('files', files).change();
    });

	let newDropArea = $('#img-preview');

    // Prevent default drag behaviors
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        newDropArea.on(eventName, function(e) {
            e.preventDefault();
            e.stopPropagation();
        });
    });

    // Highlight drop area when item is dragged over it
    ['dragenter', 'dragover'].forEach(eventName => {
        newDropArea.on(eventName, function() {
            newDropArea.addClass('highlight');
        });
    });

    ['dragleave', 'drop'].forEach(eventName => {
        newDropArea.on(eventName, function() {
            newDropArea.removeClass('highlight');
        });
    });

    // Handle dropped files
    newDropArea.on('drop', function(e) {
        let dt = e.originalEvent.dataTransfer;
        let files = dt.files;

        handleFiles(files);
        $('#coverImg').prop('files', files).change();
    });

    function handleFiles(files) {
        files = [...files];
        files.forEach(previewFile);
    }

    function previewFile(file) {
        let reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onloadend = function() {
            $('#profileDisplay').attr('src', reader.result).show();
            $('#img-preview').show();
            $('#img-placehold').hide();
        }
    }

    $('#coverImg').on('change', function() {
        let files = $(this).prop('files');
        handleFiles(files);
    });
});