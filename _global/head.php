<?php
// Set the path to the current page
$current_path = $_SERVER['PHP_SELF'];

// Remove any trailing slash from the path
$current_path = rtrim($current_path, '/');

// Get the number of subdirectories from the root directory to the current page
$subdir_count = substr_count($current_path, '/') - 1;

// Construct the relative path from the root directory to the current page
$path = str_repeat('../', $subdir_count);

// Build the canonical URL using the protocol, hostname, and current path
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$hostname = $_SERVER['HTTP_HOST'];
$canonical = $protocol . "://" . $hostname . $current_path;
$canonical = str_replace(".php", "", $canonical);

$style = '/style.css';
?>
 <head>
  <title><?php echo $title; ?></title>
  <meta name="description" content="<?php echo $description; ?>">
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
  <link rel="canonical" href="<?php echo $canonical; ?>"/>
  <link rel="stylesheet" href="<?php echo $index . $path . $style; ?>">
 <?php echo $internal_style ?>
 <?php echo $internal_head ?>
 </head>