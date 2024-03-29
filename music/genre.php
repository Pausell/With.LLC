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
     <a href="/music" class="subact"><strong>Genre</strong></a>
     <a href="artist">Artist</a>
     <a href="album">Album</a>
     <a href="song">Song</a>
     <a href="lyric">Lyric</a>
    </div>
   </div>
   <div class="padding10px">
<?php
require_once 'config.php';

// Fetch all needs from the 'music' table
$sql = "SELECT DISTINCT genre FROM music ORDER BY genre ASC";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    echo '<form action="genres" method="get" class="bulklist">';

    // Create an array to store the processed needs
    $processedNeeds = array();

    // Loop through each row and add needs to the processed array
    while ($row = $result->fetch_assoc()) {
        $needs = explode(', ', $row['genre']); // Split genres separated by commas

        foreach ($needs as $need) {
            $need = trim($need); // Remove leading/trailing spaces

            // Check if the need has not been processed yet (to avoid duplicates)
            if (!in_array($need, $processedNeeds)) {
                // Add the need to the processed array
                $processedNeeds[] = $need;
            }
        }
    }

    // Sort the processed needs array alphabetically
    asort($processedNeeds, SORT_NATURAL | SORT_FLAG_CASE);

    // Display checkboxes for each processed need
    foreach ($processedNeeds as $need) {
        // Generate the URL to view songs for the selected genre
        $url = 'genres?genre=' . urlencode($need);

        // Output checkbox with anchor text for each genre
        echo '<label>';
        echo '<input type="checkbox" name="genre[]" value="' . htmlspecialchars($need) . '">';
        echo '<a href="' . $url . '">' . htmlspecialchars($need) . '</a>';
        echo '</label><br>';
    }

    // Output button for submitting the form
    echo '<input type="submit" value="Submit">';
    echo '</form>';
} else {
    echo "No genres found.";
}

// Close the database connection
$db->close();
?>
   </div>
  </div> 
  <script>window.onload=function(){var e=document.querySelectorAll(".bulklist input[type=checkbox]"),t=document.querySelector(".bulklist input[type=submit]");t.style.display="none";for(var n=0;n<e.length;n++)e[n].addEventListener("change",function(){for(var n=!1,a=0;a<e.length;a++)if(e[a].checked){n=!0;break}t.style.display=n?"block":"none"})};</script>
 </body>
</html>