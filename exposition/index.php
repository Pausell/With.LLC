<?php
$subject = 'W / Exposition';
$description = 'Exact Xerographic Production Of Single Instance Theoretical Interpretation Or Narrative';
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
$internal_style = '<style>
#contacts-container {
  position: relative;
}

#scrollbar {
  position: fixed;
  right: 0;
  bottom: 20px;
  width: 80px; /* Set the desired width */
  color:blue
}

#letters {
  list-style: none;
  margin: 0;
  padding: 0;
}

#letters li {
  text-align: center;
  cursor: pointer;
  padding: 5px;
}

#contacts-list {
  /* Set the desired styles for the contact list */
}
</style>';
include $path.$add.'a-html.php';
include $path.$add.'head.php';
include $path.$add.'a-body.php';
include $path.$add.'a-container.php';
include $path.$add.'navigation.php';
?>
<div style="position:relative">
<span style="position:absolute;opacity:.1;z-index:-1"><h1 style="margin:0">Exact Xerographic Production Of <em style="opacity:.8">Single Instance Theoretical</em> Interpretation or Narrative</h1></span>
<div class="crumbs">
<a href="learn">Learn</a>
<span class="dropdown">
<a href="food">Food</a>
<span class="dropdown-box">
<div class="subnav">
<a href="food/taxonomy">Taxonomy</a>
<a href="food/habitat">Habitat</a>
<a href="food/nutrition">Nutrition</a>
<a href="food/cuisine">Cuisine</a>
<a href="food/flavor">Flavor</a>
<a href="food/season">Season</a>
<a href="food/harvesting">Harvesting</a>
<a href="food/storage">Storage</a>
<a href="food/history">History</a>
<a href="food/use">Use</a>
</div>
</span>
</span>
<a href="apparel">Apparel</a>
<a href="shelter">Shelter</a>
<a href="travel">Travel</a>
</div></div>

<div class="padding10px">

</div>

<?php
$text = "1 28&radic;e 980";
echo $text;
include $path.$add.'c-div.php';
include $path.$add.'script.php';
include $path.$add.'c-body_html.php';
?>