<html>
<?php
$title = 'Holy Bible';
$description = 'Basic Instructionset Before Leaving Earth';
$index = '../';
$path = '_global';

include $index . $path . ('/head.php');
?>
<body>
<div id="container">
<?php $bible = true; $collection = true; ?>
<h1>The Holy Bible</h1>
<!-- modern publication --><p>Uploaded at Inland Pacific Northwest by (gematria of) 1611.</p>
<?php include 'ot.php'; include 'nt.php'; ?>
</div>
</body>
</html>