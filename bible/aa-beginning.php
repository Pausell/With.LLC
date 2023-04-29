<?php
 $style = '../style.css';
 include ('../add/html.php'); 
 include ('../head.php');
 include ('../add/body.php');
 include ('../add/container.php');
 include ('../navigation.php');
 include ('../add/pad.php'); 
 include ('table.php');
 include ('../add/endtainer.php');
?>
<div class="collection padding10px">
<a href="<?php $bookname ?>" download="<?php $bookname ?>" title="Download <?php $bookname ?>">Save <?php $bookname ?></a>
</div>