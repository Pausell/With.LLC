<?php
$title = 'Bible Old Testament';
$description = 'Holy Bible Old Testament';
$include = true;
if (!isset($include2)) {
 include ('aa-beginning.php');
}

include ('books.php');
# 1t
foreach ($books as $bookname => $book) {
 if ($book["testament"] === "old") {
  $book = $bookname;
  include("$book.php");
 }
}

if (!isset($include2)) {
 include ('aa-end.php');
}
?>