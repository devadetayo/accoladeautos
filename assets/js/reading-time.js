$(document).ready(function() {
    // Select the target div and get its text content
    var text = $('.blog-content').text();
  
    // Function to count words
    function countWords(str) {
      return str.trim().split(/\s+/).length;
    }
  
    // Calculate the number of words
    var wordCount = countWords(text);
  
    // Average reading speed (words per minute)
    var readingSpeed = 200; // You can adjust this value
  
    // Calculate read time in minutes
    var readTime = Math.ceil(wordCount / readingSpeed);
  
    // Display the read time
    $('.read-time').text(readTime +' Min Read');
  });