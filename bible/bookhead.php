<?php
$index = "../";
$path = "_global";

?> <html> <?php
 include $index . $path . ('head.php');
?><body><div id="container"> <?php
 include $index . $path . ('navigation.php');
 echo $addedcrumbs;
 ?> <div style="padding:10px"> <?php
 include ('table.php');
?> </div>
<div class="collection padding10px">
<a href="<?php echo $title ?>" download="<?php echo basename(__FILE__); ?>" title="Download <?php echo $title ?>">Save <?php echo $title ?></a>
</div>