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
<span style="position:absolute;opacity:.1;z-index:-1"><h1 style="margin:0">Families</h1></span>
<?php include 'indexnav.php'; ?>
<div class="crumbs">
<a href="kingdom">Kingdom</a>
<a href="phylum">Phylum</a>
<a href="class">Class</a>
<a href="order">Order</a>
<a href="family" class="subact"><strong>Families</strong></a>
<a href="genus">Genus</a>
<a href="species">Species</a>
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
if (isset($_GET['family'])) {
    if (is_array($_GET['family'])) {
        $selectedItems = $_GET['family'];
        echo "<p class=\"subact\">";

        $numItems = count($selectedItems);
        $counter = 0;

        foreach ($selectedItems as $selectedItem) {
            echo "<a href=\"families?family=" . urlencode($selectedItem) . "\">" . $selectedItem . "</a>";
            $counter++;
            if ($counter < $numItems) {
                echo ", ";
            }
        }

        echo "</p>";
    } else {
        $selectedItem = $_GET['family'];
        echo "<p class=\"subact\"><a href=\"family\">" . $selectedItem . "</a></p>";
    }
}

require_once '../config.php';

// Retrieve the selectedNeeds from the URL parameter
$selectedNeeds = $_GET['family'] ?? array();

if (!is_array($selectedNeeds)) {
    $selectedNeeds = array($selectedNeeds);
}

if (!empty($selectedNeeds)) {
    // Sanitize and escape the selectedNeeds
    $sanitizedNeeds = array_map(function($need) use ($db) {
        return $db->real_escape_string($need);
    }, $selectedNeeds);

    // Fetch all families from the 'food' table
    $sql = "SELECT * FROM food";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $needsFound = false;

        // Loop through each row and display need information for the selected needs
        while ($row = $result->fetch_assoc()) {
            $needNames = explode(', ', $row['family']); // Split needs separated by commas

            // Check if any of the needNames match the selectedNeeds
            foreach ($needNames as $needName) {
                $needName = trim($needName); // Remove leading/trailing spaces

                if (in_array($needName, $sanitizedNeeds)) {
                    // Display song information for the matched need
                    $needsFound = true;

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

                    // Display information
                    echo "<h2><a href=\"cultivars?cultivar=" . urlencode($cultivar) . "\" id=\"#" . urlencode($title) . "\">" . $title . "</a></h2>";
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
                    echo "" . $recipe . "<br>";
                    echo "<br>";
                }
            }
        }

        if (!$needsFound) {
            echo "No food found for the selected families.";
        }
    } else {
        echo "No families found in the food database.";
    }
} else {
    echo "No families selected.";
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