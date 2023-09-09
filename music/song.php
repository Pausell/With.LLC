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
<a href="playlist">Playlist</a>
<a href="genre">Genre</a>
<a href="artist">Artist</a>
<a href="album">Album</a>
<a href="/music" class="subact"><strong>Song</strong></a>
<a href="lyric">Lyric</a>
</div>
</div>

<div class="padding10px">

<?php
require_once 'config.php';

// Fetch all needs from the '' table
$sql = "SELECT DISTINCT title FROM music";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    echo '<form action="songs" method="get" class="bulklist">';
    
    // Loop through each row and display need as a checkbox
    while ($row = $result->fetch_assoc()) {
        $need = $row['title'];

        // Generate the URL to view songs for the selected genre
        $url = 'songs?title=' . urlencode($need);

        // Output checkbox with anchor text
        echo '<label>';
        echo '<input type="checkbox" name="title[]" value="' . htmlspecialchars($need) . '">';
        echo '<a href="' . $url . '">' . htmlspecialchars($need) . '</a>';
        echo '</label><br>';
    }
    
    // Output button for submitting the form
    echo '<input type="submit" value="Submit">';
    echo '</form>';
} else {
    echo "No songs found.";
}

// Close the database connection
$db->close();
?>

</div>
<?php
include $path.$add.'c-div.php';
include $path.$add.'script.php';
?>
<script>window.onload=function(){var e=document.querySelectorAll(".bulklist input[type=checkbox]"),t=document.querySelector(".bulklist input[type=submit]");t.style.display="none";for(var n=0;n<e.length;n++)e[n].addEventListener("change",function(){for(var n=!1,a=0;a<e.length;a++)if(e[a].checked){n=!0;break}t.style.display=n?"block":"none"})};</script>
<?php
include $path.$add.'c-body_html.php';
?>