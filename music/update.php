<?php
include_once 'app.php';
$title = 'W / Updates';
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
     <a href="song">Song</a>
     <a href="lyric">Lyric</a>
    </div>
   </div>
   <div class="padding10px">

   </div>
  </div>
 </body>
</html> 