$(document).ready(function() {
  // Create code wrapper with header and copy button for each pre tag
  $('pre').each(function() {
    var $pre = $(this);
    var codeText = $pre.find('code').text();
    var language = $pre.find('code').attr('class').replace('language-', ''); // Extract language from class
    
    // Create code wrapper
    var $codeWrapper = $('<div class="code-wrapper"></div>');
    
    // Create code header with language and copy button
    var $codeHeader = $('<div class="lang-option">' + '<div class="mac-circle">' + '<span class="code-circle color-danger">' + '</span>' + '<span class="code-circle color-warning">' + '</span>' + '<span class="code-circle color-success">' + '</span>' +
                          '<span class="language">' + language + '</span>'+ '</div>' +
                        '</div>');
    var $copyBtn = $('<button class="copy-btn">' +
                        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" width="20" height="20" fill="currentColor" class="copy-svg"><path d="M216,32H88a8,8,0,0,0-8,8V80H40a8,8,0,0,0-8,8V216a8,8,0,0,0,8,8H168a8,8,0,0,0,8-8V176h40a8,8,0,0,0,8-8V40A8,8,0,0,0,216,32ZM160,208H48V96H160Zm48-48H176V88a8,8,0,0,0-8-8H96V48H208Z"/></svg>' +
                        '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20" fill="currentColor" class="checked-svg"><path d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"/></svg>' +
                      '</button>');
    
    // Click event handler for copy button
    $copyBtn.click(function() {
      var tempInput = $('<textarea>'); // Create a temporary textarea element
      $('body').append(tempInput); // Append it to the body
      tempInput.val(codeText).select(); // Set its value to code text and select it
      document.execCommand('copy'); // Execute the copy command
      tempInput.remove(); // Remove the temporary textarea
      
      // Toggle copy and checked SVG icons
      var copySvg = $(this).find('.copy-svg');
      var checkedSvg = $(this).find('.checked-svg');
      copySvg.hide();
      checkedSvg.show();
      setTimeout(function() {
        checkedSvg.hide();
        copySvg.show();
      }, 2000);
    });
    
    // Append elements to the code wrapper
    $codeWrapper.append($codeHeader);
    $codeHeader.append($copyBtn);
    $codeWrapper.append($pre.clone()); // Append a clone of the pre tag
    
    // Replace original pre tag with the code wrapper
    $pre.replaceWith($codeWrapper);
    
  });
});