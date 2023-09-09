<?php
$title = 'W / Food';
$description = 'Exact Xerographic Production Of Single Instance Theoretical Interpretation Or Narrative';
$path = "../../../";
$add = "add/";
$favicon = $path.$add.'favicon.png';
$favicon16 = $path.$add.'favicon16.png';
$iphone = $path.'touch-icon-iphone.png';
$ipad = $path.'touch-icon-ipad.png';
$iphoner = $path.'touch-icon-iphone-retina.png';
$ipadr = $path.'touch-icon-ipad-retina.png';
$browserconfig = $path.$add.'browserconfig.xml';
$style = $path.$add.'style.css';
$internal_style = 
'<style>
a{text-decoration:none}
@media screen and (-webkit-min-device-pixel-ratio:0) { 
input {font-size: 16px}
}
.hidden{opacity:0;width:0px;height:0px}
ol{text-transform:capitalize}
</style>';
include $path.$add.'a-html.php';
include $path.$add.'head.php';
include $path.$add.'a-body.php';
include $path.$add.'a-container.php';
include $path.$add.'navigation.php';

?>
<div style="position:relative">
<span style="position:absolute;opacity:.1;z-index:-1"><h1 style="margin:0">Species</h1></span>
<?php include 'indexnav.php'; ?>
<div class="crumbs">
<a href="kingdom">Kingdom</a>
<a href="phylum">Phylum</a>
<a href="class">Class</a>
<a href="order">Order</a>
<a href="family">Family</a>
<a href="genus">Genus</a>
<a href="species" class="subact"><strong>Species</strong></a>
<a href="variety">Variety</a>
<a href="subspecies">Subspecies</a>
<a href="strain">Strain</a>
<a href="clade">Clade</a>
<a href="hybrid">Hybrid</a>
<a href="form">Form</a>
<a href="cultivar">Cultivar</a>
</div>
</div>

<div class="padding10px">

<?php
require_once '../config.php';

// Fetch all needs from the 'food' table
$sql = "SELECT DISTINCT species FROM food ORDER BY species ASC";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    echo '<form action="speciesplural" method="get" class="bulklist">';

    // Create an array to store the processed needs
    $processedNeeds = array();

    // Loop through each row and add needs to the processed array
    while ($row = $result->fetch_assoc()) {
        $needs = explode(', ', $row['species']); // Split speciesplural separated by commas

        foreach ($needs as $need) {
            $need = trim($need); // Remove leading/trailing spaces

            // Check if the need has not been processed yet (to avoid duplicates)
            if (!in_array($need, $processedNeeds)) {
                // Add the need to the processed array
                $processedNeeds[] = $need;
            }
        }
    }

    // Sort the processed needs array alphabetically
    asort($processedNeeds, SORT_NATURAL | SORT_FLAG_CASE);

    // Display checkboxes for each processed need
    foreach ($processedNeeds as $need) {
        // Generate the URL to view songs for the selected species
        $url = 'speciesplural?species=' . urlencode($need);

        // Output checkbox with anchor text for each species
        echo '<label>';
        echo '<input type="checkbox" name="species[]" value="' . htmlspecialchars($need) . '">';
        echo '<a href="' . $url . '">' . htmlspecialchars($need) . '</a>';
        echo '</label><br>';
    }

    // Output button for submitting the form
    echo '<input type="submit" value="Submit">';
    echo '</form>';
} else {
    echo "No species (plural) found.";
}

// Close the database connection
$db->close();
?>

</div>
<?php
include $path.$add.'c-div.php';
include $path.$add.'script.php';
?>
<script>window.onload=function(){var e=document.querySelectorAll(".bulklist input[type=checkbox]"),t=document.querySelector(".bulklist input[type=submit]");t.style.display="none";for(var n=0;n<e.length;n++)e[n].addEventListener("change",function(){for(var n=!1,a=0;a<e.length;a++)if(e[a].checked){n=!0;break}t.style.display=n?"block":"none"})};</script>
<?php
include $path.$add.'c-body_html.php';
?>