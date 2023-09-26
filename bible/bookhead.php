<?php
$index = "../";
$path = "_global/";

?> <html> <?php
 include $index . $path . ('head.php');
?><body><div id="container"> <?php
 include $index . $path . ('navigation.php');
 echo $addedcrumbs;
 ?> <div style="padding:10px"> <?php
 include ('table.php');
?> </div>