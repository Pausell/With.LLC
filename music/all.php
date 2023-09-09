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
<a href="/"><strong>All</strong></a>
<a href="genre">Genre</a>
<a href="artist">Artist</a>
<a href="album">Album</a>
<a href="song">Song</a>
</div>
</div>

<div class="padding10px">
<?php
$include = true;

$excludedFiles = ['aa-beginning.php', 'aa-end.php', 'index.php', 'all.php', 'genre.php', 'artist.php', 'album.php', 'song.php'];

$musicDir = '../music/';

// Create an empty array to store file information
$musicFiles = [];

// Get a list of all PHP files in the music directory
$files = glob($musicDir . '*.php');

// Iterate over each file
foreach ($files as $file) {
    // Exclude the specified files
    if (in_array(basename($file), $excludedFiles)) {
        continue;
    }

    // Store the contents of the file
    ob_start();
    require $file;
    $fileContents = ob_get_clean();

    // Extract the variables from the loaded file
    $title = isset($title) ? $title : '';
    $description = isset($description) ? $description : '';
    $genre = isset($genre) ? $genre : []; // Modified to handle multiple genres
    $album = isset($album) ? $album : '';
    $art = isset($art) ? $art : '';
    $artist = isset($artist) ? $artist : '';

    // Add the file information to the array
    $musicFiles[] = [
        'title' => $title,
        'description' => $description,
        'genre' => $genre,
        'album' => $album,
        'art' => $art,
        'artist' => $artist,
        'fileContents' => $fileContents
    ];
}

// Define the sorting function
function sortMusicFiles($a, $b) {
    // First, sort by genre (using array_diff() to compare multiple genres)
    $genreComparison = count(array_diff($a['genre'], $b['genre']));
    if ($genreComparison !== 0) {
        return $genreComparison;
    }

    // If the genre is the same, sort by artist
    $artistComparison = strcmp($a['artist'], $b['artist']);
    if ($artistComparison !== 0) {
        return $artistComparison;
    }

    // If the artist is the same, sort by album
    return strcmp($a['album'], $b['album']);
}

// Sort the array using the defined function
usort($musicFiles, 'sortMusicFiles');

// Iterate over the sorted array
foreach ($musicFiles as $musicFile) {
    // Echo the variables
    echo "Title: {$musicFile['title']}<br>";
    echo "Description: {$musicFile['description']}<br>";
    echo "Genre: " . implode(', ', $musicFile['genre']) . "<br>"; // Modified to handle multiple genres
    echo "Album: {$musicFile['album']}<br>";
    echo "Art: {$musicFile['art']}<br>";
    echo "Artist: {$musicFile['artist']}<br>";
    echo "<br>";

    // Echo the file contents if they exist and are not empty
    if (!empty($musicFile['fileContents'])) {
        echo "File Contents: <br>";
        echo $musicFile['fileContents'];
        echo "<br><br>";
    }
}
?>

</div>
<?php
include $path.$add.'c-div.php';
include $path.$add.'script.php';
include $path.$add.'c-body_html.php';
?>