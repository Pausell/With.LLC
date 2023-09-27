<?php
$title = 'W / Music';
$description = 'Vocal Expanse Network Tool Using Real Elements';
$index = "../";
$path = "_global/";
$style = 'style.css';
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
?>
<html>
 <?php include $path.$add.'head.php'; ?>
 <body>
  <div id="container">
   <?php include $path.$add.'navigation.php'; ?>
   <div style="position:relative">
    <span style="position:absolute;opacity:.1;z-index:-1"><h1 style="margin:0">Vocal Expanse Network Tool <em style="opacity:.8">Using</em> Real Elements</h1></span>
    <div class="crumbs">
     <a href="playlist">Playlist</a>
     <a href="genre">Genre</a>
     <a href="artist">Artist</a>
     <a href="album">Album</a>
     <a href="song" class="subact"><strong>Songs</strong></a>
     <a href="lyric">Lyric</a>
    </div>
   </div>
   <div class="padding10px">
<?php
// Check if the 'song' parameter is not present in the current URL
if (!isset($_GET['song'])) {
    // Get the selected items from the 'title' parameter in the URL
    $selectedItems = $_GET['title'] ?? array();

    // Check if there are multiple items selected
    if (is_array($selectedItems) && count($selectedItems) > 1) {
        // Create an array to store the anchor links for in-page scrolling
        $anchorLinks = array();

        // Loop through the selected items and create anchor links
        foreach ($selectedItems as $item) {
            // Remove spaces from the title and replace them with plusses
            $anchorTitle = str_replace(' ', '+', $item);
            // Generate the URL to view the item in-page
            $itemUrl = '#' . $anchorTitle;
            // Create the anchor link with the title as the ID for in-page scrolling
            $anchorLinks[] = '<a href="' . $itemUrl . '">' . htmlspecialchars($item) . '</a>';
        }

        // Output the anchor links with items separated by a comma
        echo '<p class="subact">' . implode(', ', $anchorLinks) . '</p>';
    }
}

require_once 'config.php';

// Retrieve the selected needs from the URL parameter
$selectedNeeds = $_GET['title'] ?? array();

if (!is_array($selectedNeeds)) {
    $selectedNeeds = array($selectedNeeds);
}

if (!empty($selectedNeeds)) {
    // Sanitize and escape the need names
    $sanitizedNeeds = array_map(function($need) use ($db) {
        return $db->real_escape_string($need);
    }, $selectedNeeds);

    // Create the IN clause for the SQL query
    $inClause = "'" . implode("','", $sanitizedNeeds) . "'";

    // Fetch needs from the '' table based on the selected needs, sorted by need (alphabetical)
    $sql = "SELECT * FROM music WHERE title IN ($inClause) ORDER BY title ASC";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        // Loop through each row and display need information
        while ($row = $result->fetch_assoc()) {
            $title = $row['title'];
            $description = $row['description'];
            $playlist = $row['playlist'];
            $genre = $row['genre'];
            $artist = $row['artist'];
            $album = $row['album'];
            $lyrics = $row['lyrics'];

            // Display song information
             // Check if the 'song' parameter is not present in the current URL
             if (!isset($_GET['song'])) {
                 // Remove spaces from the title and replace them with plusses
                 $anchorTitle = str_replace(' ', '+', $title);
             
                 // Check if the 'title' parameter is not present in the current URL
                 if (!isset($_GET['title'])) {
                     // Output the anchor link with the title as the ID for in-page scrolling
                     echo '<a href="songs?title=' . $anchorTitle . '" id="' . $anchorTitle . '"><h2>' . htmlspecialchars($title) . '</h2></a>';
                 } else {
                     // Retrieve the current song's titles from the URL parameter
                     $selectedSongs = $_GET['title'];
             
                     // Check if the 'title' parameter contains more than one song (an array with multiple items)
                     if (is_array($selectedSongs) && count($selectedSongs) > 1) {
                         // Output the anchor link with the title as the ID for in-page scrolling
                         echo '<a href="songs?title=' . $anchorTitle . '" id="' . $anchorTitle . '"><h2>' . htmlspecialchars($title) . '</h2></a>';
                     } else {
                         // Output just the h2 element without the anchor link
                         echo '<h2>' . htmlspecialchars($title) . '</h2>';
                     }
                 }
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
        echo "No lyrics found for the selected songs.";
    }
} else {
    echo "No songs selected.";
}

// Close the database connection
$db->close();
?>
   </div>
  </div>
 </body>
</html> 