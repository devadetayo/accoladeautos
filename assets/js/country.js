$(document).ready(function() {
    var currentIndex = -1; // To keep track of the current highlighted item
    var selectedIndex = -1; // To keep track of the selected item

    // Fetch country data from the API
    $.ajax({
        url: 'https://restcountries.com/v3.1/all',
        method: 'GET',
        success: function(data) {
            var itemsContainer = $('#country-list');
            itemsContainer.empty(); // Clear any existing items

            // Sort the countries alphabetically by name
            data.sort(function(a, b) {
                var nameA = a.name.common.toUpperCase(); // Ignore upper and lowercase
                var nameB = b.name.common.toUpperCase(); // Ignore upper and lowercase
                return nameA.localeCompare(nameB);
            });

            // Populate the dropdown with countries
            data.forEach(function(country, index) {
                var countryName = country.name.common;
                var countryCode = country.cca2;

                // Append country items to the dropdown
                itemsContainer.append(
                    `<span class="select-item d-flex w-full py-8 px-12 bg-white dark:bg-slate-800 hover:bg-slate-100 hover:color-black dark:hover:bg-slate-700 dark:hover:color-white" data-value="${countryCode}" data-index="${index}" role="option" tabindex="-1">${countryName}</span>`
                );
            });

            // Highlight the first item or previously selected item
            if (selectedIndex >= 0) {
                highlightItem($('.select-item'), selectedIndex);
                currentIndex = selectedIndex;
            } else if ($('.select-item').length > 0) {
                highlightItem($('.select-item'), 0);
                currentIndex = 0;
            }
        },
        error: function() {
            console.error('Failed to fetch country data');
        }
    });

    // Toggle the dropdown when the selected item is clicked
    $('.select-selected').click(function() {
        $('#country-list').toggleClass('d-none').toggleClass('d-flex');
        $(this).toggleClass('focus');
        $(this).attr('aria-expanded', $(this).hasClass('d-flex'));
        $(this).find('.select-arrow').css({'transform' : 'rotate(180deg)'});
        
        // Highlight the first item or previously selected item
        if ($('#country-list').hasClass('d-flex')) {
            currentIndex = selectedIndex >= 0 ? selectedIndex : 0; // Highlight the first or previously selected item
            highlightItem($('.select-item'), currentIndex);
        }
    });

    // Hide the dropdown when clicking outside of it
    $(document).click(function(event) {
        if (!$(event.target).closest('.custom-select').length) {
            $('#country-list').addClass('d-none').removeClass('d-flex');
            $('.select-selected').removeClass('focus').attr('aria-expanded', 'false');
            $(this).find('.select-arrow').css({'transform' : 'rotate(0deg)'});
        }
    });

    // Prevent hiding dropdown when clicking inside it
    $('.custom-select').click(function(event) {
        event.stopPropagation();
    });

    // Handle item selection on click
    $('#country-list').on('click', '.select-item', function() {
        selectCountry($(this));
    });

    // Keyboard navigation and alphabet jumping
    $(document).keydown(function(event) {
        if ($('#country-list').hasClass('d-flex')) { // Only navigate if dropdown is open
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
                        selectCountry($(items[currentIndex]));
                    }
                } else if (event.key === 'Escape') {
                    event.preventDefault();
                    $('#country-list').addClass('d-none').removeClass('d-flex');
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

    function selectCountry(item) {
        var selectedText = item.text();
        var selectedValue = item.data('value');

        // Set the selected value and text
        $('.select-selected').find('.selected-text').text(selectedText);
        $('#country-name').val(selectedValue); // Set hidden input value

        // Hide the options
        $('#country-list').addClass('d-none').removeClass('d-flex');
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