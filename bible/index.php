<?php
$title = 'Holy Bible';
$description = 'Basic Instructionset Before Leaving Earth';
$index = '_global';
$path = '../';

$crumbs = '<div class="crumbs">
<a href="https://with.llc/bible">King James Authorized Version 1611</a>
</div>';
$addedcrumbs = $crumbs;

$bible = true;
include 'ot.php';
include 'nt.php';
?>