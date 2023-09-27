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
     <a href="artist" class="subact"><strong>Artists</strong></a>
     <a href="album">Album</a>
     <a href="song">Song</a>
     <a href="lyric">Lyric</a>
    </div>
   </div>
   <div class="padding10px">
<?php
if (isset($_GET['artist'])) {
    if (is_array($_GET['artist'])) {
        $selectedItems = $_GET['artist'];
        echo "<p class=\"subact\">";

        $numItems = count($selectedItems);
        $counter = 0;

        foreach ($selectedItems as $selectedItem) {
            echo "<a href=\"artists?artist=" . urlencode($selectedItem) . "\">" . $selectedItem . "</a>";
            $counter++;
            if ($counter < $numItems) {
                echo ", ";
            }
        }

        echo "</p>";
    } else {
        $selectedItem = $_GET['artist'];
        echo "<p class=\"subact\"><a href=\"artist\">" . $selectedItem . "</a></p>";
    }
}

require_once 'config.php';

// Retrieve the selectedNeeds from the URL parameter
$selectedNeeds = $_GET['artist'] ?? array();

if (!is_array($selectedNeeds)) {
    $selectedNeeds = array($selectedNeeds);
}

if (!empty($selectedNeeds)) {
    // Sanitize and escape the selectedNeeds
    $sanitizedNeeds = array_map(function($need) use ($db) {
        return $db->real_escape_string($need);
    }, $selectedNeeds);

    // Fetch all songs from the 'music' table
    $sql = "SELECT * FROM music";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $needsFound = false;

        // Loop through each row and display need information for the selected needs
        while ($row = $result->fetch_assoc()) {
            $needNames = explode(', ', $row['artist']); // Split needs separated by commas

            // Check if any of the needNames match the selectedNeeds
            foreach ($needNames as $needName) {
                $needName = trim($needName); // Remove leading/trailing spaces

                if (in_array($needName, $sanitizedNeeds)) {
                    // Display song information for the matched need
                    $needsFound = true;

                    $title = $row['title'];
                    $description = $row['description'];
                    $playlist = $row['playlist'];
                    $genre = $row['genre'];
                    $artist = $row['artist'];
                    $album = $row['album'];
                    $lyrics = $row['lyrics'];

                    // Display song information
                    echo "<h2><a href=\"songs?title=" . urlencode($title) . "\" id=\"#" . urlencode($title) . "\">" . $title . "</a></h2>";
                    echo "Description: " . $description . "<br>";
                    echo "Playlist: " . $playlist . "<br>";
                    echo "Genre: " . $genre . "<br>";
                    echo "Artist: " . $artist . "<br>";
                    echo "Album: " . $album . "<br>";
                    echo "Lyrics: " . $lyrics . "<br>";
                    echo "<br>";
                }
            }
        }

        if (!$needsFound) {
            echo "No songs found for the selected artists.";
        }
    } else {
        echo "No songs found in the music database.";
    }
} else {
    echo "No artists selected.";
}

// Close the database connection
$db->close();
?>
   </div>
  </div>
 </body>
</html>