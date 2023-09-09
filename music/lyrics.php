<?php
$title = 'W / Music';
$description = 'Vocal Expanse Network Tool Using Real Elements';
$path = "../";
$add = "add/";
$favicon = $path.$add.'favicon.png';
$favicon16 = $path.$add.'favicon16.png';
$iphone = $path.'touch-icon-iphone.png';
$ipad = $path.'touch-icon-ipad.png';
$iphoner = $path.'touch-icon-iphone-retina.png';
$ipadr = $path.'touch-icon-ipad-retina.png';
$browserconfig = $path.$add.'browserconfig.xml';
$style = $path.$add.'style.css';
$internal_style = 
'<style>
h2{padding-top:40px}
a{text-decoration:none}
@media screen and (-webkit-min-device-pixel-ratio:0) { 
input {font-size: 16px}
}
.hidden{opacity:0;width:0px;height:0px}
ol{text-transform:capitalize}
</style>';
$script = '
<script>
window.onload = function() {
  // Get the form element
  var form = document.getElementById(\'lyricsForm\');

  // Get the container element to append checkboxes
  var filterContainer = document.getElementById(\'filter1\');

  // Add event listener for form submission
  form.addEventListener(\'submit\', function(e) {
    e.preventDefault();

    // Get all the selected checkboxes
    var checkboxes = form.querySelectorAll(\'input[type="checkbox"]:checked\');

    // Get the values of the selected checkboxes
    var selectedWords = Array.from(checkboxes).map(function(checkbox) {
      return checkbox.value;
    });

    // Filter the results based on the selected words
    var songElements = document.getElementsByClassName(\'song\');

    for (var i = 0; i < songElements.length; i++) {
      var songElement = songElements[i];
      var lyrics = songElement.dataset.lyrics.toLowerCase();

      var showSong = selectedWords.every(function(word) {
        return lyrics.includes(word.toLowerCase());
      });

      if (showSong) {
        songElement.style.display = \'block\';
      } else {
        songElement.style.display = \'none\';
      }
    }
  });

  // Add checkboxes dynamically
  var uniqueWords = ' . json_encode($uniqueWords) . ';

  for (var i = 0; i < uniqueWords.length; i++) {
    var word = uniqueWords[i];

    // Create checkbox element
    var checkbox = document.createElement(\'input\');
    checkbox.type = \'checkbox\';
    checkbox.name = \'word[]\';
    checkbox.value = word;

    // Create label element
    var label = document.createElement(\'label\');
    label.appendChild(checkbox);
    label.appendChild(document.createTextNode(word));

    // Append checkbox to the filter container
    filterContainer.appendChild(label);
  }
};
</script>';
include $path.$add.'a-html.php';
include $path.$add.'head.php';
include $path.$add.'a-body.php';
include $path.$add.'a-container.php';
include $path.$add.'navigation.php';

?>
<div style="position:relative">
<span style="position:absolute;opacity:.1;z-index:-1"><h1 style="margin:0">Vocal Expanse Network Tool <em style="opacity:.8">Using</em> Real Elements</h1></span>
<div class="crumbs">
<a href="playlist">Playlist</a>
<a href="genre">Genre</a>
<a href="artist">Artist</a>
<a href="album">Album</a>
<a href="song">Song</a>
<a href="lyric" class="subact"><strong>Lyrics</strong></a>
</div>
</div>
<div id="filter1"></div>
<div class="padding10px">

<div id="filter1"></div>

<?php
require_once 'config.php';

// Retrieve the selected words from the URL parameter
$selectedWords = $_GET['word'] ?? array();

if (!is_array($selectedWords)) {
    $selectedWords = array($selectedWords);
}

if (!empty($selectedWords)) {
    // Sanitize and escape the selected words
    $sanitizedWords = array_map(function ($word) use ($db) {
        return $db->real_escape_string($word);
    }, $selectedWords);

    // Build the LIKE clause with wildcard for each selected word
    $likeClauses = array_map(function ($word) {
        return "lyrics REGEXP '[[:<:]]" . $word . "[[:>:]]'";
    }, $sanitizedWords);

    // Join the LIKE clauses with OR operator
    $likeClause = implode(" OR ", $likeClauses);

    // Fetch songs from the 'music' table based on the selected words using a case-insensitive regex
    $sql = "SELECT * FROM music WHERE " . $likeClause . " ORDER BY lyrics ASC, CAST(lyrics AS SIGNED) ASC";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        // Output the selected lyrics
        echo '<p class="subact">';
        $selectedLyrics = array();
        foreach ($selectedWords as $lyric) {
            $lyricUrl = 'lyrics?word=' . urlencode($lyric);
            $selectedLyrics[] = '<a href="' . $lyricUrl . '">' . htmlspecialchars($lyric) . '</a>';
        }
        echo implode(', ', $selectedLyrics);
        echo '</p>';

        // Output the anchor links with songs and selected lyrics separated by a comma
        echo '<p>';
        $songLinks = array();
        while ($row = $result->fetch_assoc()) {
            // Check if the selected lyrics are also present in the song's lyrics using regex
            $matchingLyrics = array();
            foreach ($selectedWords as $word) {
                if (preg_match('/\b' . preg_quote($word, '/') . '\b/i', $row['lyrics'])) {
                    $matchingLyrics[] = $word;
                }
            }

            // Remove spaces from the title and replace them with plusses
            $anchorTitle = str_replace(' ', '+', $row['title']);
            // Generate the anchor link with the title as the ID for in-page scrolling
            $songLink = '<a href="#' . $anchorTitle . '">' . $row['title'];
            if (!empty($matchingLyrics)) {
                $songLink .= ' (' . implode(', ', $matchingLyrics) . ')';
            }
            $songLink .= '</a>';
            $songLinks[] = $songLink;
        }
        echo implode(', ', $songLinks);
        echo '</p>';

        // Rewind the result to the beginning for the next loop
        $result->data_seek(0);

        // Loop through each row and display song information
        while ($row = $result->fetch_assoc()) {
            $title = $row['title'];
            $description = $row['description'];
            $playlist = $row['playlist'];
            $genre = $row['genre'];
            $artist = $row['artist'];
            $album = $row['album'];
            $lyrics = $row['lyrics'];

            // Check if the selected lyrics are also present in the song's lyrics using regex
            $matchingLyrics = array();
            foreach ($selectedWords as $word) {
                if (preg_match('/\b' . preg_quote($word, '/') . '\b/i', $lyrics)) {
                    $matchingLyrics[] = $word;
                }
            }

            // Display song information
            // Check if the 'song' parameter is not present in the current URL
            if (!isset($_GET['lyrics'])) {
                // Remove spaces from the title and replace them with plusses
                $anchorTitle = str_replace(' ', '+', $title);

                // Check if the 'title' parameter is not present in the current URL
                if (!isset($_GET['word'])) {
                    // Output the anchor link with the title as the ID for in-page scrolling
                    echo '<a href="songs?title=' . $anchorTitle . '" id="' . $anchorTitle . '"><h2>' . htmlspecialchars($title) . '</h2></a>';
                } else {
                    // Retrieve the current song's titles from the URL parameter
                    $selectedSongs = $_GET['word'];

                    echo '<a href="songs?title=' . $anchorTitle . '" id="' . $anchorTitle . '"><h2>' . htmlspecialchars($title) . '</h2></a>';
                }
            }

            // Display the relevant selected lyrics for the current song
            if (!empty($matchingLyrics)) {
                echo '<p class="subact">';
                $lyricLinks = array();
                foreach ($matchingLyrics as $lyric) {
                    $lyricUrl = 'lyrics?word=' . urlencode($lyric);
                    $lyricLinks[] = '<a href="' . $lyricUrl . '">' . htmlspecialchars($lyric) . '</a>';
                }
                echo implode(', ', $lyricLinks);
                echo '</p>';
            }

            echo "Description: " . $description . "<br>";
            echo "Playlist: " . $playlist . "<br>";
            echo "Genre: " . $genre . "<br>";
            echo "Artist: " . $artist . "<br>";
            echo "Album: " . $album . "<br>";
            echo "Lyrics: " . $lyrics . "<br>";
            echo "<br>";
        }
    } else {
        echo "No songs found for the selected lyrics.";
    }
} else {
    echo "No lyrics selected.";
}

// Close the database connection
$db->close();
?>

</div>
<?php
include $path.$add.'c-div.php';
include $path.$add.'script.php';
include $path.$add.'c-body_html.php';
?>