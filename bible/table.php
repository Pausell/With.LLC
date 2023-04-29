<?php
include ('books.php');

$ifindex = ((basename($_SERVER['PHP_SELF']) == 'index.php') ? 'bible/' : '');
$targets = ((basename($_SERVER['PHP_SELF']) == 'index.php') ? 'target="_blank"' : '');

$ot = '<div class="collection">';
$ot .= '<a target="_blank" href="' . $ifindex . 'ot"><h2>Old Testament</h2></a>';
$ot .= '<p class="subhead2">God promised to destroy death.</p>';
$ot .= '<ol class="opaquenumber">';

$nt = '<div class="collection">';
$nt .= '<a target="_blank" href="' . $ifindex . 'nt"><h2>New Testament</h2></a>';
$nt .= '<p class="subhead2">God tells us how He destroyed death.</p>';
$nt .= '<ol class="opaquenumber">';

$closeT = '</ol></div>';

echo $ot;
$q = 0;
foreach ($books as $bookname => $access) {
 if ($access["testament"] === "old") {
  $q = $access["chapters"];
  echo '<li><section class="accordion"><input type="checkbox" name="collapse" id="' . $bookname . '" ' . ((basename($_SERVER['PHP_SELF']) == $bookname . '.php') ? 'checked="checked"' : '') . '><a class="handle"><label for="' . $bookname . '">' . ucfirst($bookname) . " " . '<span>' . $q . '</span>' . '</label></a><br/><div class="content"><span class="chapters">';
   for ($i = 1; $i <= $access["chapters"]; $i++) {
    echo '<a ' . $targets . ' href="' . $ifindex . $bookname . '#' . $i . '">' . $i . '</a>';
   }
  echo '</span></div></section></li>'; 
  }
 }
echo $closeT;
echo $nt;
foreach ($books as $bookname => $access) {
 if ($access["testament"] === "new") {
  $q = $access["chapters"];
  echo '<li><section class="accordion"><input type="checkbox" name="collapse" id="' . $bookname . '" ' . ((basename($_SERVER['PHP_SELF']) == $bookname . '.php') ? 'checked="checked"' : '') . '><a class="handle"><label for="' . $bookname . '">' . ucfirst($bookname) . " " . '<span>' . $q . '</span>' . '</label></a><br/><div class="content"><span class="chapters">';
   for ($i = 1; $i <= $access["chapters"]; $i++) {
    echo '<a ' . $targets . ' href="' . $ifindex . $bookname . '#' . $i . '">' . $i . '</a>';
   }
  echo '</span></div></section></li>'; 
  }
 }
echo $closeT;
?>