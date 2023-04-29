<!DOCTYPE html>
<head>
<title>W/A Venture</title>
<meta name="description" content="Music">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
<link rel="shortcut icon" type="image/png" href="favicon.png">
<link rel="shortcut icon" type="image/png" href="favicon-16.png">
<link rel="apple-touch-icon" href="touch-icon-iphone.png">
<link rel="apple-touch-icon" sizes="152x152" href="touch-icon-ipad.png">
<link rel="apple-touch-icon" sizes="180x180" href="touch-icon-iphone-retina.png">
<link rel="apple-touch-icon" sizes="167x167" href="touch-icon-ipad-retina.png">
<meta name="msapplication-config" content="browserconfig.xml"/>
<link rel="canonical" href="Witha.com/music"/>
<link rel="stylesheet" href="style.css">
<style>
a{text-decoration:none}
@media screen and (-webkit-min-device-pixel-ratio:0) { 
input {font-size: 16px}
}
.hidden{opacity:0;width:0px;height:0px}
ol{text-transform:capitalize}
</style>
</head>
<body>
<?php include_once('nav.php'); ?>
<!--<div class="p">
<p>&#34;where there is neither Greek nor Jew, circumcision nor uncircumcision, Barbarian, Scythian, bond nor free: but Christ is all, and in all. Put on therefore, as the elect of God, holy and beloved, bowels of mercies, kindness, humbleness of mind, meekness, longsuffering; forbearing one another, and forgiving one another, if any man have a quarrel against any: even as Christ forgave you, so also do ye. And above all these things put on charity, which is the bond of perfectness. And let the peace of God rule in your hearts, to the which also ye are called in one body; and be ye thankful. Let the word of Christ dwell in you richly in all wisdom; teaching and admonishing one another in psalms and hymns and spiritual songs, singing with grace in your hearts to the Lord. And whatsoever ye do in word or deed, do all in the name of the Lord Jesus, giving thanks to God and the Father by him.&#34;
<br/><strong>Colossians 3:11-17 KJB</strong>
<a target="_blank" href="https://bible.com/bible/1/col.3.16.KJV"><em>Bible.com</em></a>
</p>
</div>-->
<div class="padding10px">
<h1>Vocal Expanse Network Tool Using Real Elements</h1>
<div>
<a href="../music/book">Expand</a>
</div>
<ol id="list">
<?php
$dir = "../music";
$allfiles = array();
if (is_dir($dir)){
if ($handle = opendir($dir)){
while (($file = readdir($handle)) != false){
$allfiles[] = $file;
}
closedir($handle);
}
}
sort($allfiles);
foreach($allfiles as $file){
$str4 = str_replace(".php", "", $file);
$str3 = str_replace("-", " ", $str4);
$str2 = str_replace("_", " ", $str3);
$str1 = str_replace(".html", "", $str2);
$str = str_replace(".php", "", $str1);
if(($file != 'index.php') && ($file != '.') && ($file != '..') && ($file != 'php_errorlog') && ($file != 're.css') && ($file != 'book.php') && ($file != 'aa-beginning.php') && ($file != 'aa-end.php')){
echo "<li><a target='_blank' href='$file'>$str</a><br/></li>";
}
}
?>
</ol>
</div>
<?php include_once('footer.php'); ?>
</body>
</html>