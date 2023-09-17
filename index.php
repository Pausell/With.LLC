<?php
$index = '';
$path = '_global';
?>
<html>
 <head>
  <title>With.LLC</title>
  <meta name="description" content="Written Is The Holy Diadem Of Time's Legible Language Cartographer">
  <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
  <link rel="shortcut icon" href="favicon.ico?n=2023">
   <link rel="shortcut icon" type="image/png" href="favicon.png?n=2023">
   <link rel="icon" type="image/png" sizes="32x32" href="favicon32.png?n=2023">
   <link rel="icon" type="image/png" sizes="16x16" href="favicon16.png?n=2023">
   <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
   <link rel="manifest" href="/site.webmanifest?n=2023">
   <link rel="mask-icon" href="safari-pinned-tab.svg?n=2023" color="#ff0000">
   <meta name="msapplication-TileColor" content="#00a300">
   <meta name="theme-color" content="#ffffff">
  <link rel="canonical" href="https://with.llc"/>
  <link rel="stylesheet" href="<?php echo $index . $path . ('/style.css'); ?>">
  <!--_module-->
  <link rel-"stylesheet" href="_module/search.css">
 </head>
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
    <p style="margin:0">The Son of God is destroyed by His own hand willingly on the cross.</p>
   </div>
   <?php include '_global/navigation.php'; ?>
  </div>
 </body>
</html>