<?php
$title = 'Bible New Testament';
$description = 'Holy Bible New Testament';
$include = true;
if (!isset($include2)) {
 include ('aa-beginning.php');
}

include ('books.php');
# 2t
foreach ($books as $bookname => $book) {
 if ($book["testament"] === "new") {
  $book = $bookname;
  include("$book.php");
 }
}

if (!isset($include2)) {
 include ('aa-end.php');
}
?>