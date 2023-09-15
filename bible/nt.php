<?php
$collection = true;
if (!isset($bible)) {include 'testamenthead.php';}
$files_to_include = [
 'matthew.php',
 'mark.php',
 'luke.php',
 'john.php',
 'acts.php',
 'romans.php',
 'corinthians.php',
 'corinthians2.php',
 'galatians.php',
 'ephesians.php',
 'philippians.php',
 'colossians.php',
 'thessalonians.php',
 'thessalonians2.php',
 'timothy.php',
 'timothy2.php',
 'titus.php',
 'philemon.php',
 'hebrews.php',
 'james.php',
 'peter.php',
 'peter2.php',
 'john1.php',
 'john2.php',
 'john3.php',
 'jude.php',
 'revelation.php'
];
foreach ($files_to_include as $file) {
 include $file;
}

?>