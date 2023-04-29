<?php
// Get the absolute path to the current script
$current_path = realpath(__FILE__);
// Get the absolute path to the root directory
$root_path = realpath($_SERVER['DOCUMENT_ROOT']);
// Calculate the relative path from the current script to the root directory
$path = str_repeat('../', substr_count(dirname($current_path), '/') - substr_count(dirname($root_path), '/'));

// Get the protocol and hostname from the current request
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$hostname = $_SERVER['HTTP_HOST'];
// Set the path to the current page
$current_path = "/music";
// Build the canonical URL using the protocol, hostname, and current path
$canonical = $protocol . "://" . $hostname . $current_path;

// Resources Directory
$add = "add";

// Template
$title = 'W/A';
$description = 'Written Is The Holy Legible Language Cartographer';
$favicon = 'favicon.png';
$favicon16 = 'favicon16.png';
$style = 'style.css';
?>
<head>
 <title><?php echo $title; ?></title>
 <meta name="description" content="<?php echo $description; ?>">
 <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
 <link rel="shortcut icon" type="image/png" href="<?php echo $path . $favicon; ?>">
 <link rel="shortcut icon" type="image/png" href="<?php echo $path . $favicon16; ?>">
  <link rel="apple-touch-icon" href="<?php echo $path; ?>touch-icon-iphone.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $path; ?>touch-icon-ipad.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $path; ?>touch-icon-iphone-retina.png">
  <link rel="apple-touch-icon" sizes="167x167" href="<?php echo $path; ?>touch-icon-ipad-retina.png">
 <meta name="msapplication-config" content="<?php echo $path; ?>browserconfig.xml"/>
 <link rel="manifest" href="<?php echo $path; ?>add/manifest.json">
 <link rel="canonical" href="<?php echo $canonical; ?>"/>
 <link rel="stylesheet" href="<?php echo $path; ?><?php echo $style; ?>">
<style>
<?php echo $internal_style ?>
</style>
<?php echo $internal_head ?>
</head>