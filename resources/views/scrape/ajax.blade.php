<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Page Design</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Custom CSS */
    .container {
      margin-top: 20px;
    }
    .book-item {
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 10px;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Book Collection</h1>
    <div id="booksContainer"></div>
    <div id="loading" class="text-center">
      <img src="loading.gif" alt="Loading...">
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    $(document).ready(function() {
      var page = 1;

      // Function to load books
      function loadBooks() {
        $('#loading').show();

        // Simulate AJAX request to load books
        setTimeout(function() {
          $.ajax({
            url: 'load-books.php',
            type: 'GET',
            data: { page: page },
            dataType: 'json',
            success: function(response) {
              if (response.length > 0) {
                var booksHtml = '';

                // Generate HTML for each book
                $.each(response, function(index, book) {
                  booksHtml += '<div class="book-item">';
                  booksHtml += '<h3>' + book.title + '</h3>';
                  booksHtml += '<p>Author: ' + book.author + '</p>';
                  booksHtml += '<p>Pages: ' + book.pagesCount + '</p>';
                  booksHtml += '<p>Language: ' + book.language + '</p>';
                  booksHtml += '<p>Size: ' + book.size + '</p>';
                  booksHtml += '<a href="' + book.pdfUrl + '">Download PDF</a>';
                  booksHtml += '</div>';
                });

                $('#booksContainer').append(booksHtml);
                page++;
              } else {
                $('#loading').html('<p>No more books to load.</p>');
              }

              $('#loading').hide();
            },
            error: function() {
              $('#loading').html('<p>Error loading books.</p>');
              $('#loading').hide();
            }
          });
        }, 1000);
      }

      // Load books on page load
      loadBooks();

      // Load more books when user scrolls to the bottom
      $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
          loadBooks();
        }
      });
    });
  </script>
</body>
</html>