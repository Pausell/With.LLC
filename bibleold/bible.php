<?php
ob_start(); // Start output buffering

// PHP to render the HTML goes here
$title = 'Holy Bible';
$description = 'Basic Instructionset Before Leaving Earth';
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

$include2 = true;
if (!isset($include3)) {
 include ('aa-beginning.php');
}

# 1t
include 'ot.php';
# 2t
include 'nt.php';
if (!isset($include3)) {
 include ('aa-end.php');
}
// End Download

$html = ob_get_clean(); // Capture the output and store it in a variable
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="bible.html"');
echo $html;
exit();
?>