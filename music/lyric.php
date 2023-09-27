<?php
<?php
$title = 'W / Music';
$description = 'Vocal Expanse Network Tool Using Real Elements';
$index = "../";
$path = "_global/";
$style = 'style.css';
$internal_style = 
'<style>
a{text-decoration:none}
@media screen and (-webkit-min-device-pixel-ratio:0) { 
input {font-size: 16px}
}
.hidden{opacity:0;width:0px;height:0px}
ol{text-transform:capitalize}
</style>';
?>
<html>
 <?php include $index.$path.'head.php'; ?>
 <body>
  <div id="container">
   <?php include $index.$path.'navigation.php'; ?>
   <div style="position:relative">
    <span style="position:absolute;opacity:.1;z-index:-1"><h1 style="margin:0">Vocal Expanse Network Tool <em style="opacity:.8">Using</em> Real Elements</h1></span>
    <div class="crumbs">
     <a href="playlist">Playlist</a>
     <a href="genre">Genre</a>
     <a href="artist">Artist</a>
     <a href="album">Album</a>
     <a href="song">Song</a>
     <a href="/music" class="subact"><strong>Lyric</strong></a>
    </div>
   </div>
   <div class="padding10px">
<?php
require_once 'config.php';

// Fetch all lyrics from the 'music' table
$sql = "SELECT lyrics FROM music";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // Create an array to store all the unique words in lyrics
    $uniqueWords = array();

    while ($row = $result->fetch_assoc()) {
        $lyrics = $row['lyrics'];

        // Remove HTML tags using strip_tags function
        $lyricsWithoutHTML = strip_tags($lyrics);

        // Replace line breaks with spaces to ensure words on different lines are separated
        $lyricsWithoutHTML = str_replace(array("\r\n", "\r", "\n"), ' ', $lyricsWithoutHTML);

        // Extract individual words from lyrics
        $words = preg_split('/\s+/', $lyricsWithoutHTML);

        foreach ($words as $word) {
            // Remove special characters and leading/trailing single quotes
            $cleanWord = preg_replace('/[^\p{L}\p{N}\']+/', ' ', $word);
            $cleanWord = trim($cleanWord, "'");
            $cleanWord = trim($cleanWord); // Remove leading/trailing spaces

            if (!empty($cleanWord) && !is_numeric($cleanWord)) {
                // Convert the word to lowercase
                $lowercaseWord = strtolower($cleanWord);

                // Split hyphenated words into separate words
                $splitWords = preg_split('/[-\s]+/', $lowercaseWord);

                // Store the split words in the uniqueWords array
                foreach ($splitWords as $splitWord) {
                    $uniqueWords[$splitWord] = $splitWord;
                }
            }
        }
    }

    // Sort the unique words alphabetically
    asort($uniqueWords, SORT_NATURAL | SORT_FLAG_CASE);

    if (!empty($uniqueWords)) {
        // Output the unique words as checkboxes with links
        echo '<form action="lyrics" method="get" class="bulklist">';

        foreach ($uniqueWords as $word) {
            // Generate the URL to view songs for the selected word
            $url = 'lyrics?word=' . urlencode($word);

            // Output checkbox with anchor text
            echo '<label>';
            echo '<input type="checkbox" name="word[]" value="' . htmlspecialchars($word) . '">';
            echo '<a href="' . $url . '">' . htmlspecialchars($word) . '</a>';
            echo '</label><br>';
        }

        // Output button for submitting the form
        echo '<input type="submit" value="Submit">';
        echo '</form>';
    } else {
        echo "No words found in the lyrics.";
    }
} else {
    echo "No lyrics found.";
}

// Close the database connection
$db->close();
?>
   </div>
  </div>
  <script>window.onload=function(){var e=document.querySelectorAll(".bulklist input[type=checkbox]"),t=document.querySelector(".bulklist input[type=submit]");t.style.display="none";for(var n=0;n<e.length;n++)e[n].addEventListener("change",function(){for(var n=!1,a=0;a<e.length;a++)if(e[a].checked){n=!0;break}t.style.display=n?"block":"none"})};</script>
 </body>
</html> 