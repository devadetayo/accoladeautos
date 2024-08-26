$(document).ready(function() {
    var currentIndex = -1; // To keep track of the current highlighted item
    var selectedIndex = -1; // To keep track of the selected item

    // Toggle the dropdown when the selected item is clicked
    $('.select-selected').click(function() {
        var select = $(this);
        var options = $(this).parent().find('.select-list');
        var selectPosition = select.offset();
        var selectHeight = select.outerHeight();
        var optionsHeight = options.outerHeight();
        var windowHeight = $(window).height();
        var spaceBelow = windowHeight - selectPosition.top - selectHeight;
        var spaceAbove = selectPosition.top - $(window).scrollTop();

        // Adjust dropdown position based on available space
        if (spaceBelow < optionsHeight && spaceAbove > optionsHeight) {
            options.css({'bottom': '52px', 'top': 'auto'});
        } else {
            options.css({'top': '52px', 'bottom': 'auto'});
        }

        $('.select-list').removeClass('d-flex').addClass('d-none');
        options.toggleClass('d-none').toggleClass('d-flex');
        select.toggleClass('focus');
        select.attr('aria-expanded', select.hasClass('d-flex'));

        // Highlight the previously selected item when opening the dropdown
        if (options.hasClass('d-flex')) {
            currentIndex = selectedIndex >= 0 ? selectedIndex : 0; // Highlight the first or previously selected item
            highlightItem($('.select-item'), currentIndex);
            scrollToView($('.select-item').eq(currentIndex)); // Ensure it's scrolled into view
        }

        $(this).find('.select-arrow').css({'transform' : 'rotate(180deg)'});
    });

    // Hide the dropdown when clicking outside of it
    $(document).click(function(event) {
        if (!$(event.target).closest('.custom-select').length) {
            $('.select-list').addClass('d-none').removeClass('d-flex');
            $('.select-selected').removeClass('focus').attr('aria-expanded', 'false');
            $('.select-arrow').css({'transform': 'rotate(0deg)'});
        }
    });

    // Prevent hiding dropdown when clicking inside it
    $('.custom-select').click(function(event) {
        event.stopPropagation();
    });

    // Handle item selection on click
    $('.select-list').on('click', '.select-item', function() {
        selectItem($(this));
    });

    // Keyboard navigation and alphabet jumping
    $(document).keydown(function(event) {
        if ($('.select-list').hasClass('d-flex')) { // Only navigate if dropdown is open
            var items = $('.select-item');
            if (items.length > 0) {
                if (event.key === 'ArrowDown') {
                    event.preventDefault();
                    if (currentIndex < items.length - 1) {
                        currentIndex++;
                        highlightItem(items, currentIndex);
                        scrollToView(items[currentIndex]);
                    }
                } else if (event.key === 'ArrowUp') {
                    event.preventDefault();
                    if (currentIndex > 0) {
                        currentIndex--;
                        highlightItem(items, currentIndex);
                        scrollToView(items[currentIndex]);
                    }
                } else if (event.key === 'Enter') {
                    event.preventDefault();
                    if (currentIndex >= 0) {
                        selectItem($(items[currentIndex]));
                    }
                } else if (event.key === 'Escape') {
                    event.preventDefault();
                    $('.select-list').addClass('d-none').removeClass('d-flex');
                    $('.select-selected').removeClass('focus').attr('aria-expanded', 'false');
                } else if (/^[a-zA-Z]$/.test(event.key)) { // Check if the key is an alphabet
                    event.preventDefault();
                    jumpToAlphabet(items, event.key.toUpperCase());
                }
            }
        }
    });

    function highlightItem(items, index) {
        items.removeClass('highlighted').attr('aria-selected', 'false');
        $(items[index]).addClass('highlighted').attr('aria-selected', 'true').focus();
    }

    function scrollToView(item) {
        item.get(0).scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    function selectItem(item) {
        var selectedText = item.text();
        var selectedValue = item.data('value');
        var selectName = item.closest('.custom-select').find('.select-name');

        // Set the selected value and text
        item.closest('.custom-select').find('.select-selected .selected-text').text(selectedText);
        selectName.val(selectedValue); // Set hidden input value
        item.closest('.custom-select').find('.select-selected .select-arrow').css({'transform': 'rotate(0deg)'});

        // Hide the options
        $('.select-list').addClass('d-none').removeClass('d-flex');
        $('.select-selected').removeClass('focus').attr('aria-expanded', 'false');

        // Set selected index
        selectedIndex = item.data('index');
        currentIndex = selectedIndex;

        // Optionally do something with the selected value
        console.log('Selected value:', selectedValue);
    }

    function jumpToAlphabet(items, alphabet) {
        for (var i = 0; i < items.length; i++) {
            if ($(items[i]).text().toUpperCase().startsWith(alphabet)) {
                currentIndex = i;
                highlightItem(items, currentIndex);
                scrollToView(items[currentIndex]);
                break;
            }
        }
    }
});