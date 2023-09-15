<?php
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
$crumbs = '<div class="crumbs">
<a href="https://with.llc/bible">King James Authorized Version 1611</a>
<a class="sub" href="commandments">Commandments</a>
<a class="sub" href="help">Help</a>
<a class="sub" href="stories">Stories</a>
</div>';
$addedcrumbs = $crumbs;

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
?>