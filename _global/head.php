<?php
$style = 'style.css';
?>
 <head>
  <title><?php echo $title; ?></title>
  <meta name="description" content="<?php echo $description; ?>">
  <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
  <link rel="shortcut icon" href="<?php echo $index; ?>favicon.ico?n=2023">
   <link rel="shortcut icon" type="image/png" href="<?php echo $index; ?>favicon.png?n=2023">
   <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $index . ?>favicon32.png?n=2023">
   <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $index . ?>favicon16.png?n=2023">
   <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $index . ?>apple-touch-icon.png">
   <link rel="manifest" href="/site.webmanifest?n=2023">
   <link rel="mask-icon" href="safari-pinned-tab.svg?n=2023" color="#ff0000">
   <meta name="msapplication-TileColor" content="#00a300">
  <link rel="canonical" href="<?php echo $canonical; ?>"/>
  <link rel="stylesheet" href="<?php echo $index . $path . $style; ?>">
 <?php echo $internal_style ?>
 <?php echo $internal_head ?>
 </head>