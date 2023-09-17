<?php
$index = '';
$path = '_global';
$internal_style = '<!--_module-->
  <link rel-"stylesheet" href="_module/search.css">';
?>
<html>
 <?php include $index . $path . ('head.php'); ?>
 <body>
  <div id="container">
   <span style="position:absolute;opacity:.1;z-index:-1"><h1 style="margin:0">Written Is The Holy <em style="opacity:.8">Diadem Of Time&#39;s </em> Legible Language Cartographer</h1></span>
   <form id="search-form" style="margin:0">
    <h1><input type="search" id="search-input" placeholder="W/" />
     <button type="submit" id="search-button">Search</button></h1>
   </form>
   <!--<div id="search-suggestions">
    <div class="suggestion">Suggestion 1</div>
    <div class="suggestion">Suggestion 2</div>
    <div class="suggestion">Suggestion 3</div>
    <div class="suggestion">Suggestion 4</div>
   </div>-->
   <?php if (!empty($error_message)): ?>
    <p class="error-message"><?= $error_message ?></p>
   <?php endif; ?>
   <div class="padding10px">
    <p style="margin:0">Save One More ENCORE!</p>
    <p><a href="bible">Read</a> basic instructions before leaving earth, <a href="exposition">write</a> extra xerographic production of single instance theoretical interpretations or narratives, <a href="music">sing</a> vocal expanse network tools using real elements, and <a href="altar">pray</a> about Lamb's triumphing authority reoccuringly.</p>
    <p>The Son of God is destroyed by His own hand willingly on the cross. <a href="https://youtu.be/RmnUkNT55gU?si=hE0Tfvy9lcCpbpdZ" target="_blank">Learn more</a>.</p>
   </div>
   <?php include '_global/navigation.php'; ?>
  </div>
 </body>
</html>