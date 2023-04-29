<!DOCTYPE html>
<head>
<title>Song Book</title>
<meta name="description" content="Book.">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
<link rel="shortcut icon" type="image/png" href="../favicon.png">
<link rel="shortcut icon" type="image/png" href="../favicon-16.png">
<link rel="apple-touch-icon" href="../touch-icon-iphone.png">
<link rel="apple-touch-icon" sizes="152x152" href="../touch-icon-ipad.png">
<link rel="apple-touch-icon" sizes="180x180" href="../touch-icon-iphone-retina.png">
<link rel="apple-touch-icon" sizes="167x167" href="../touch-icon-ipad-retina.png">
<meta name="msapplication-config" content="../browserconfig.xml"/>
<link rel="canonical" href="Witha.com/book"/>
<link rel="stylesheet" href="../style.css">
<link rel="stylesheet" href="song/re.css">
<style>
a{text-decoration:none}
@media screen and (-webkit-min-device-pixel-ratio:0) { 
input {font-size: 16px}
}
.js{display:none}
ol li a{text-transform:capitalize}
ol li:not(:first-child){margin-top:80px}
@media only screen and (max-width:546px){
#song{
position:relative;
padding:0px;
left:-20px}
}
</style>
</head>
<body>
<?php include_once('../nav.php'); ?>
<div class="padding10px">
<h1>Vocal Expanse Network Tool Using Real Elements</h1>
<div>
<span class="js">
<input type="text" id="search" onkeyup="search()" placeholder="Search Song Name" title="Search Song Name">
</span>
<br class="js"/><br class="js"/>
<a href="../music">Contract</a>
</div>
<ol id="list">
<li><a href="../bible/psalm">Psalms</a></li>
<?php
$dir = "../music";
$allfiles = array();
if (is_dir($dir)) {
 if ($handle = opendir($dir)) {
  while (($file = readdir($handle)) !== false) {
   if (!is_dir($dir . "/" . $file)) {
    $allfiles[] = $file;
   }
  }
  closedir($handle);
 }
}
sort($allfiles);
foreach($allfiles as $file){
 $contents = file_get_contents("$dir/$file");
 $str4 = str_replace(".php", "", $file);
 $str3 = str_replace("-", " ", $str4);
 $str2 = str_replace("_", " ", $str3);
 $str = str_replace(".html", "", $str2);
 $contents = preg_replace('/<\?php.*?\?>/ms', '', $contents); // Remove PHP code
 if(($file != 'index.php') && ($file != 'book.php') && ($file != '.') && ($file != '..') && ($file != 'php_errorlog') && ($file != 're.css') && ($file != 'book.php') && ($file != 'aa-beginning.php') && ($file != 'aa-end.php')) {
  echo "<li><a target='_blank' href='$file'>$str</a><br/><pre>$contents</pre></li>"; // use <pre> tag to preserve newlines
 }
}
?>
</ol>
<div class="padding10px">
<a href="index.php"><img class="b" src="../srcs/WithAw.svg"/></a>
</div>
</body>
</html>