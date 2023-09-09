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
<a href="genre" class="subact"><strong>Genres</strong></a>
<a href="artist">Artist</a>
<a href="album">Album</a>
<a href="song">Song</a>
<a href="lyric">Lyric</a>
</div>
</div>

<div class="padding10px">

<?php
if (isset($_GET['genre'])) {
    if (is_array($_GET['genre'])) {
        $selectedItems = $_GET['genre'];
        echo "<p class=\"subact\">";

        $numItems = count($selectedItems);
        $counter = 0;

        foreach ($selectedItems as $selectedItem) {
            echo "<a href=\"genres?genre=" . urlencode($selectedItem) . "\">" . $selectedItem . "</a>";
            $counter++;
            if ($counter < $numItems) {
                echo ", ";
            }
        }

        echo "</p>";
    } else {
        $selectedItem = $_GET['genre'];
        echo "<p class=\"subact\"><a href=\"genre\">" . $selectedItem . "</a></p>";
    }
}

require_once 'config.php';

// Retrieve the selectedNeeds from the URL parameter
$selectedNeeds = $_GET['genre'] ?? array();

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
            $needNames = explode(', ', $row['genre']); // Split needs separated by commas

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
            echo "No songs found for the selected genres.";
        }
    } else {
        echo "No songs found in the music database.";
    }
} else {
    echo "No genres selected.";
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