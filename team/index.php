<?php
$title = 'Truth: Exposition Altar Music';
$description = 'Written Is The Holy Divinely Ordained Transcribed Legible Language Cartographer';
$internal_style = "<style>
.navcaption{position:absolute;top:2%;left:50%;transform:translateX(-50%);font-weight:700;letter-spacing:4px}
.bible{color:#fae134}
.exposition{color:#ff644d}
.music{color:#929192}
.altar{color:#0076ba}
@media screen and (max-width: 414px) {
.navcaption{display:none}
}
@media screen and (max-width: 767px) {
.navcaption{top:-7%}
#time{min-height:600px}
}
@media screen and (min-width: 768px) {
#time{min-height:1400px}
}
</style>";
$path = "../";
$add = "add/";
$favicon = $path.$add.'favicon.png';
$favicon16 = $path.$add.'favicon16.png';
$iphone = $path.'touch-icon-iphone.png';
$ipad = $path.'touch-icon-ipad.png';
$iphoner = $path.'touch-icon-iphone-retina.png';
$ipadr = $path.'touch-icon-ipad-retina.png';
$browserconfig = $path.$add.'browserconfig.xml';
$style = $path.$add.'style.css';
include $path.$add.'a-html.php';
include $path.$add.'head.php';
include $path.$add.'a-body.php';
?>
<div style="background-image:url(tunnel.jpeg);background-size:cover;background-position:center top;background-repeat:no-repeat">
<?php
include $path.$add.'a-container.php';
?><span style="z-index:2;position:relative;display:inline-block;width:100%"><?php
include $path.$add.'navigation.php';
?></span>
<div style="padding-top:10px">
<div style="position:relative;z-index:1" class="divspace" id="time">
<h1 style="color:white;text-align:center">The Instruction Manual Existing'<span style="font-size:100vw;position:absolute;opacity:.1;top:0;left:50%;transform:translateX(-50%);line-height:60vw;">S</span></h1>
<?php echo $root; ?>
</div>
</div>
</div><!-- End Background Container -->

<?php
include $path.$add.'c-div.php';
include $path.$add.'script.php';
include $path.$add.'c-body_html.php';
?>