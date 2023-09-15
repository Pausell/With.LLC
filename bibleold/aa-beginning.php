<?php
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
 include $path.$add.('a-html.php'); 
 include $path.$add.('head.php');
 include $path.$add.('a-body.php');
 include $path.$add.('a-container.php');
 include $path.$add.('navigation.php');
 echo $addedcrumbs;
 include $path.$add.('a-pad.php');
 include ('table.php');
 include $path.$add.('c-div.php');
?>
<div class="collection padding10px">
<a href="<?php echo $bookname ?>" download="<?php echo $bookname ?>" title="Download <?php echo $bookname ?>">Save <?php echo $bookname ?></a>
</div>