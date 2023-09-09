<?php
$title = 'W / Food';
$description = '';
$path = "../../";
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
<?php include 'indexnav.php'; ?>
<div class="crumbs">
<span class="dropdown">
<a href="taxonomy">Taxonomy</a>
<span class="dropdown-box">
<div class="subnav">
<a href="taxonomy/kingdom">Kingdom</a>
<a href="taxonomy/phylum">Phylum</a>
<a href="taxonomy/class">Class</a>
<a href="taxonomy/order">Order</a>
<a href="taxonomy/family">Family</a>
<a href="taxonomy/genus">Genus</a>
<a href="taxonomy/species">Species</a>
<a href="taxonomy/variety">Variety</a>
<a href="taxonomy/subspecies">Subspecies</a>
<a href="taxonomy/strain">Strain</a>
<a href="taxonomy/clade">Clade</a>
<a href="taxonomy/hybrid">Hybrid</a>
<a href="taxonomy/form">Form</a>
<a href="taxonomy/cultivar">Cultivar</a>
</div>
</span>
</span>
<a href="habitat">Habitat</a>
<a href="nutrition">Nutrition</a>
<a href="cuisine">Cuisine</a>
<a href="flavor">Flavor</a>
<a href="season">Season</a>
<a href="harvesting">Harvesting</a>
<a href="storage">Storage</a>
<a href="history">History</a>
<a href="use">Use</a>
</div>
</div>

<div class="padding10px">

</div>
<?php
include $path.$add.'c-div.php';
include $path.$add.'script.php';
include $path.$add.'c-body_html.php';
?>