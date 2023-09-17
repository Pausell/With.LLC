<html>
 <head>
  <title>With.LLC</title>
  <meta name="description" content="Written Is The Holy Diadem Of Time's Legible Language Cartographer">
  <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
  <link rel="shortcut icon" href="favicon.ico?n=2023">
   <link rel="shortcut icon" type="image/png" href="favicon.png?n=2023">
   <link rel="icon" type="image/png" sizes="32x32" href="favicon32.png?n=2023">
   <link rel="icon" type="image/png" sizes="16x16" href="favicon16.png?n=2023">
   <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
   <link rel="manifest" href="/site.webmanifest?n=2023">
   <link rel="mask-icon" href="safari-pinned-tab.svg?n=2023" color="#ff0000">
   <meta name="msapplication-TileColor" content="#00a300">
   <meta name="theme-color" content="#ffffff">
  <link rel="canonical" href="https://with.llc"/>
  <link rel="stylesheet" href="_global/style.css">
  <!--_module-->
  <link rel-"stylesheet" href="_module/search.css">
 </head>
 <body>
  <?php include '_global/navigation.php'; ?>
  <span style="position:absolute;opacity:.1;z-index:-1"><h1 style="margin:0">Written Is The Holy <em style="opacity:.8">Diadem Of Time&#39;s </em> Legible Language Cartographer</h1></span>
  <form id="search-form">
   <h1><input type="text" id="search-input" placeholder="W/" />
    <button type="submit" id="search-button">Search</button></h1>
  </form>
  <div id="search-suggestions">
   <div class="suggestion">Suggestion 1</div>
   <div class="suggestion">Suggestion 2</div>
   <div class="suggestion">Suggestion 3</div>
   <div class="suggestion">Suggestion 4</div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
  $(document).ready(function() {
  // Function to fetch and display search suggestions
  function fetchSuggestions(query) {
  $.ajax({
  url: 'fetch_suggestions.php', // Replace with your PHP script to fetch suggestions
  type: 'GET',
  data: { query: query },
  success: function(response) {
  $('#search-suggestions').html(response);
  $('#search-suggestions').show();
  }
  });
  }

  // Event handler for form submission
  $('#search-form').submit(function(e) {
  e.preventDefault();
  var query = $('#search-input').val();
  fetchSuggestions(query);
  });

  // Event handler for input change
  $('#search-input').on('input', function() {
  var query = $(this).val();
  fetchSuggestions(query);
  });

  // Event handler for suggestion selection
  $(document).on('click', '.suggestion', function() {
  var suggestion = $(this).text();
  $('#search-input').val(suggestion);
  $('#search-suggestions').hide();
  });
  });
  </script>
  <script>
  $(document).ready(function() {
  // Function to update search button text and behavior
  function updateSearchButton() {
  var query = $('#search-input').val().trim();
  var button = $('#search-button');

  if (query === '') {
      // When input is empty or just whitespace
      button.text('In');
      button.attr('href', 'in.php');
  } else {
      // When input has content
      button.text('Search');
      button.removeAttr('href');
  }
  }

  // Event handler for form submission
  $('#search-form').submit(function(e) {
  e.preventDefault();
  var query = $('#search-input').val();
  // Perform search or redirection here based on your requirements
  // For example: window.location.href = 'search.php?query=' + query;
  });

  // Event handler for input change
  $('#search-input').on('input', function() {
  updateSearchButton();
  });

  // Initial setup
  updateSearchButton();
  });
  </script>
  <?php if (!empty($error_message)): ?>
   <p class="error-message"><?= $error_message ?></p>
  <?php endif; ?>
 </body>
</html>