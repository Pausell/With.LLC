<?php
include_once 'app.php';
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
<a href="song">Song</a>
</div>
</div>
<?php
include $path.$add.'c-div.php';
?>

<?php
include $path.$add.'script.php';
include $path.$add.'c-body_html.php';
?>