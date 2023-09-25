<?php
$title = 'Old Testament';
$collection = true;
if (!isset($bible)) {include 'testamenthead.php';}
$files_to_include = [
 'genesis.php',
 'exodus.php',
 'leviticus.php',
 'numbers.php',
 'deuteronomy.php',
 'joshua.php',
 'judges.php',
 'ruth.php',
 'samuel.php',
 'samuel2.php',
 'kings.php',
 'kings2.php',
 'chronicles.php',
 'chronicles2.php',
 'ezra.php',
 'nehemiah.php',
 'esther.php',
 'job.php',
 'psalm.php',
 'proverbs.php',
 'ecclesiastes.php',
 'solomon.php',
 'isaiah.php',
 'jeremiah.php',
 'lamentations.php',
 'ezekiel.php',
 'daniel.php',
 'hosea.php',
 'joel.php',
 'amos.php',
 'obadiah.php',
 'jonah.php',
 'micah.php',
 'nahum.php',
 'habakkuk.php',
 'zephaniah.php',
 'haggai.php',
 'zechariah.php',
 'malachi.php'
];
foreach ($files_to_include as $file) {
 include $file;
}

?>