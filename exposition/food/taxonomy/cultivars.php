<?php
$cultivar = 'W / Food';
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
h2{padding-top:40px}
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
<span style="position:absolute;opacity:.1;z-index:-1"><h1 style="margin:0">Cultivars</h1></span>
<?php include 'indexnav.php'; ?>
<div class="crumbs">
<a href="kingdom">Kingdom</a>
<a href="phylum">Phylum</a>
<a href="class">Class</a>
<a href="order">Order</a>
<a href="family">Family</a>
<a href="genus">Genus</a>
<a href="species">Species</a>
<a href="variety">Variety</a>
<a href="subspecies">Subspecies</a>
<a href="strain">Strain</a>
<a href="clade">Clade</a>
<a href="hybrid">Hybrid</a>
<a href="form">Form</a>
<a href="cultivar" class="subact"><strong>Cultivars</strong></a>
</div>
</div>

<div class="padding10px">

<?php
// Check if the 'cultivar' parameter is not present in the current URL
if (!isset($_GET['cultivar'])) {
    // Get the selected items from the 'cultivar' parameter in the URL
    $selectedItems = $_GET['cultivar'] ?? array();

    // Check if there are multiple items selected
    if (is_array($selectedItems) && count($selectedItems) > 1) {
        // Create an array to store the anchor links for in-page scrolling
        $anchorLinks = array();

        // Loop through the selected items and create anchor links
        foreach ($selectedItems as $item) {
            // Remove spaces from the cultivar and replace them with plusses
            $anchorCultivar = str_replace(' ', '+', $item);
            // Generate the URL to view the item in-page
            $itemUrl = '#' . $anchorCultivar;
            // Create the anchor link with the cultivar as the ID for in-page scrolling
            $anchorLinks[] = '<a href="' . $itemUrl . '">' . htmlspecialchars($item) . '</a>';
        }

        // Output the anchor links with items separated by a comma
        echo '<p class="subact">' . implode(', ', $anchorLinks) . '</p>';
    }
}

require_once '../config.php';

// Retrieve the selected needs from the URL parameter
$selectedNeeds = $_GET['cultivar'] ?? array();

if (!is_array($selectedNeeds)) {
    $selectedNeeds = array($selectedNeeds);
}

if (!empty($selectedNeeds)) {
    // Sanitize and escape the need names
    $sanitizedNeeds = array_map(function($need) use ($db) {
        return $db->real_escape_string($need);
    }, $selectedNeeds);

    // Create the IN clause for the SQL query
    $inClause = "'" . implode("','", $sanitizedNeeds) . "'";

    // Fetch needs from the '' table based on the selected needs, sorted by need (alphabetical)
    $sql = "SELECT * FROM food WHERE cultivar IN ($inClause) ORDER BY cultivar ASC";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        // Loop through each row and display need information
        while ($row = $result->fetch_assoc()) {
            $title = $row['title'];
            $description = $row['description'];
            $kingdom = $row['kingdom'];
            $phylum = $row['phylum'];
            $class = $row['class'];
            $order = $row['order'];
            $family = $row['family'];
            $genus = $row['genus'];
            $species = $row['species'];
            $variety = $row['variety'];
            $subspecies = $row['subspecies'];
            $strain = $row['strain'];
            $clade = $row['clade'];
            $hybrid = $row['hybrid'];
            $form = $row['form'];
            $cultivar = $row['cultivar'];
            $habitat = $row['habitat'];
            $nutrition = $row['nutrition'];
            $cuisine = $row['cuisine'];
            $flavor = $row['flavor'];
            $season = $row['season'];
            $harvesting = $row['harvesting'];
            $storage = $row['storage'];
            $history = $row['history'];
            $use = $row['use'];
            $recipe = $row['recipe'];

            // Display cultivar information
             // Check if the 'cultivar' parameter is not present in the current URL
             if (!isset($_GET['cultivar'])) {
                 // Remove spaces from the cultivar and replace them with plusses
                 $anchorCultivar = str_replace(' ', '+', $cultivar);
             
                 // Check if the 'cultivar' parameter is not present in the current URL
                 if (!isset($_GET['cultivar'])) {
                     // Output the anchor link with the cultivar as the ID for in-page scrolling
                     echo '<a href="cultivars?cultivar=' . $anchorCultivar . '" id="' . $anchorCultivar . '"><h2>' . htmlspecialchars($cultivar) . '</h2></a>';
                 } else {
                     // Retrieve the current cultivar's cultivars from the URL parameter
                     $selectedCultivars = $_GET['cultivar'];
             
                     // Check if the 'cultivar' parameter contains more than one cultivar (an array with multiple items)
                     if (is_array($selectedCultivars) && count($selectedCultivars) > 1) {
                         // Output the anchor link with the cultivar as the ID for in-page scrolling
                         echo '<a href="cultivars?cultivar=' . $anchorCultivar . '" id="' . $anchorCultivar . '"><h2>' . htmlspecialchars($cultivar) . '</h2></a>';
                     } else {
                         // Output just the h2 element without the anchor link
                         echo '<h2>' . htmlspecialchars($cultivar) . '</h2>';
                     }
                 }
             }
            echo "<h2><a href=\"cultivars?cultivar=" . urlencode($cultivar) . "\" id=\"#" . urlencode($cultivar) . "\">" . $title . "</a></h2>";
            echo "Description: " . $description . "<br>";
            echo "Kingdom: " . $kingdom . "<br>";
            echo "Phylum: " . $phylum . "<br>";
            echo "Class: " . $class . "<br>";
            echo "Order: " . $order . "<br>";
            echo "Family: " . $family . "<br>";
            echo "Genus: " . $genus . "<br>";
            echo "Species: " . $species . "<br>";
            echo "Variety: " . $variety . "<br>";
            echo "Subspecies: " . $subspecies . "<br>";
            echo "Strain: " . $strain . "<br>";
            echo "Clade: " . $clade . "<br>";
            echo "Hybrid: " . $hybrid . "<br>";
            echo "Form: " . $form . "<br>";
            echo "Cultivar: " . $cultivar . "<br>";
            echo "Habitat: " . $habitat . "<br>";
            echo "Nutrition: " . $nutrition . "<br>";
            echo "Cuisine: " . $cuisine . "<br>";
            echo "Flavor: " . $flavor . "<br>";
            echo "Season: " . $season . "<br>";
            echo "Harvesting: " . $harvesting . "<br>";
            echo "Storage: " . $storage . "<br>";
            echo "History: " . $history . "<br>";
            echo "Use: " . $use . "<br>";
            echo "" . $recipe . "<br>";
            echo "<br>";
        }
    } else {
        echo "No information found for the selected cultivars.";
    }
} else {
    echo "No cultivars selected.";
}

// Close the database connection
$db->close();
?>

</div>
<?php
include $path.$add.'c-div.php';
include $path.$add.'script.php';
include $path.$add.'c-body_html.php';
?>