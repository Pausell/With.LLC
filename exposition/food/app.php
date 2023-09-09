<?php
require_once 'config.php';

// Check if the 'food' table exists
$table_check_query = "SHOW TABLES LIKE 'food'";
$result = $db->query($table_check_query);

if ($result->num_rows == 0) {
    // If the 'food' table does not exist, create it
    $table_create_query = "CREATE TABLE food (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL UNIQUE,
        description VARCHAR(255) NOT NULL,
        taxonomy VARCHAR(255) NOT NULL,
        kingdom VARCHAR(64) NOT NULL,
        phylum VARCHAR(64) NOT NULL,
        class VARCHAR(64) NOT NULL,
        `order` VARCHAR(64) NOT NULL,
        family VARCHAR(64) NOT NULL,
        genus VARCHAR(64) NOT NULL,
        species VARCHAR(64) NOT NULL,
        variety VARCHAR(64) NOT NULL,
        subspecies VARCHAR(64) NOT NULL,
        strain VARCHAR(64) NOT NULL,
        clade VARCHAR(64) NOT NULL,
        hybrid VARCHAR(64) NOT NULL,
        form VARCHAR(64) NOT NULL,
        cultivar VARCHAR(64) NOT NULL,
        habitat VARCHAR(255) NOT NULL,
        nutrition VARCHAR(255) NOT NULL,
        cuisine VARCHAR(255) NOT NULL,
        flavor VARCHAR(255) NOT NULL,
        season VARCHAR(255) NOT NULL,
        harvesting VARCHAR(255) NOT NULL,
        storage VARCHAR(255) NOT NULL,
        history VARCHAR(255) NOT NULL,
        `use` VARCHAR(255) NOT NULL,
        recipe TEXT NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

    if ($db->query($table_create_query) !== TRUE) {
        die("Error creating table: " . $db->error);
    }
}

// Add food items to the 'food' table
$foodItems = array(
    array(
        'title' => 'Honeycrisp Apple',
        'description' => 'A sweet and crunchy apple variety known for its distinct flavor.',
        'taxonomy' => 'Malus domestica',
        'kingdom' => 'Plantae',
        'phylum' => 'Angiosperms',
        'class' => 'Eudicots',
        'order' => 'Rosales',
        'family' => 'Rosaceae',
        'genus' => 'Malus',
        'species' => 'M. domestica',
        'variety' => 'Honeycrisp',
        'subspecies' => 'Not applicable',
        'strain' => 'Not applicable',
        'clade' => 'Not applicable',
        'hybrid' => 'Cultivated hybrid',
        'form' => 'Not applicable',
        'cultivar' => 'Honeycrisp',
        'habitat' => 'Orchards, Temperate Climates',
        'nutrition' => '4g Carbohydrate, 0.6g Dietary Fiber, 3g Sugar, 0.1g Protein, 1.2mg Vitamin C 2%, 1.3mg Magnesium 0%, 1.6mg Calcium 0%, 0.8&#181;g Vitamin A 0%, 28mg Potassium 0%,',
        'cuisine' => 'Used in various culinary applications, cooked, fresh.',
        'flavor' => 'Sweet, Slightly Tart',
        'season' => 'Fall',
        'harvesting' => 'Ripe, Hand, Machine',
        'storage' => 'Store in a cool, dry place or refrigerator',
        'history' => 'Developed in Minnesota, USA, in the 1960s',
        'use' => 'Eaten fresh, used in baking and cooking',
        'recipe' => 'Can be used in pies, crisps, and salads<br/>'
    ),
    array(
        'title' => 'Spinach',
        'description' => 'Leafy green vegetable known for its nutrient density.',
        'taxonomy' => '',
        'kingdom' => 'Plantae',
        'phylum' => 'Angiosperms',
        'class' => 'Eudicots',
        'order' => 'Caryophyllales',
        'family' => 'Amaranthaceae',
        'genus' => 'Spinacia',
        'species' => 'S. oleracea',
        'variety' => 'Not Applicable',
        'subspecies' => 'Not Applicable',
        'strain' => 'Not Applicable',
        'clade' => 'Not Applicable',
        'hybrid' => 'Not Applicable',
        'form' => 'Not Applicable',
        'cultivar' => 'Spinach',
        'habitat' => 'No Habitat',
        'nutrition' => '970 mg per 100g of Oxalates, 4g Carbohydrate, 2.2g Dietary Fiber, 0.4g Sugar, 2.9g Protein, 47mg Vitamin C 78%, 47mg Calcium 5%, 558mg Potassium 12%,',
        'cuisine' => 'Used in salads, soups, and various dishes.',
        'flavor' => 'Mild, Slightly Bitter',
        'season' => 'Spring, Fall',
        'harvesting' => 'Leaves are typically harvested when young and tender, before becoming bitter and going to seed.',
        'storage' => 'Store in the refrigerator to maintain freshness.',
        'history' => 'Cultivated for centuries and believed to have originated in Persia.',
        'use' => 'Eaten fresh or cooked, salad, smoothie, sautéed dishes.',
        'recipe' => '<br/>'
    ),
    array(
        'title' => 'Rhubarb',
        'description' => 'A tart and tangy vegetable often used in desserts like pies and crumbles.',
        'taxonomy' => '',
        'kingdom' => 'Plantae',
        'phylum' => 'Angiosperms',
        'class' => 'Eudicots',
        'order' => 'Caryophyllales',
        'family' => 'Polygonaceae',
        'genus' => 'Rheum',
        'species' => 'R. rhabarbarum',
        'variety' => 'Not Applicable',
        'subspecies' => 'Not Applicable',
        'strain' => 'Not Applicable',
        'clade' => 'Not Applicable',
        'hybrid' => 'Not Applicable',
        'form' => 'Not Applicable',
        'cultivar' => 'Rhubarb',
        'habitat' => 'Temperate Climates, Cultivated',
        'nutrition' => '450 mg per 100g of Oxalates, 2.0g Carbohydrate, 1.8g Dietary Fiber, 1.1g Sugar, 0.9g Protein, 10mg Vitamin C 16%, 288mg Calcium 29%, 288mg Potassium 6%,',
        'cuisine' => 'Used in pies, crumbles, and desserts.',
        'flavor' => 'Tart, Tangy',
        'season' => 'Spring, Early Summer',
        'harvesting' => 'Stalks are typically harvested when young and tender, before becoming bitter and going to seed.',
        'storage' => 'Store in the refrigerator to maintain freshness.',
        'history' => 'Cultivated for centuries in Asia and Europe.',
        'use' => 'Commonly used in pies, crumbles, jams, and desserts.',
        'recipe' => '<br/>'
    ),
    array(
    'title' => 'Beets',
    'description' => 'A root vegetable known for its vibrant color and earthy flavor.',
    'taxonomy' => '',
    'kingdom' => 'Plantae',
    'phylum' => 'Angiosperms',
    'class' => 'Eudicots',
    'order' => 'Caryophyllales',
    'family' => 'Amaranthaceae',
    'genus' => 'Beta',
    'species' => 'B. vulgaris',
    'variety' => 'Beets',
    'subspecies' => 'Not Applicable',
    'strain' => 'Not Applicable',
    'clade' => 'Not Applicable',
    'hybrid' => 'Not Applicable',
    'form' => 'Not Applicable',
    'cultivar' => 'Beets',
    'habitat' => 'Temperate Climates, Cultivated',
    'nutrition' => 'Highest in oxalates among root vegetables, approximately 180 mg per 100g, 9.6g Carbohydrate, 2.8g Dietary Fiber, 6.8g Sugar, 1.6g Protein, 4.9mg Vitamin C 8%, 16mg Calcium 2%, 325mg Potassium 7%,',
    'cuisine' => 'Used in salads, roasting, pickling, and as a side dish.',
    'flavor' => 'Earthy, Sweet',
    'season' => 'Year-round',
    'harvesting' => 'Roots are typically harvested when mature.',
    'storage' => 'Store in a cool, dark place or refrigerator.',
    'history' => 'Cultivated for centuries and believed to have originated in the Mediterranean region.',
    'use' => 'Eaten cooked or raw in salads, used in various culinary applications.',
    'recipe' => '<br/>'
    ),
    array(
    'title' => 'Potatoes (Baked)',
    'description' => 'Starchy tubers often baked and served as a side dish.',
    'taxonomy' => '',
    'kingdom' => 'Plantae',
    'phylum' => 'Angiosperms',
    'class' => 'Eudicots',
    'order' => 'Solanales',
    'family' => 'Solanaceae',
    'genus' => 'Solanum',
    'species' => 'S. tuberosum',
    'variety' => 'Potatoes',
    'subspecies' => 'Not Applicable',
    'strain' => 'Not Applicable',
    'clade' => 'Not Applicable',
    'hybrid' => 'Cultivated hybrid',
    'form' => 'Not Applicable',
    'cultivar' => 'Potatoes',
    'habitat' => 'Cultivated Worldwide',
    'nutrition' => '7 mg per 100g of Oxalates, 20.1g Carbohydrate, 1.8g Dietary Fiber, 0.8g Sugar, 2.0g Protein, 19.7mg Vitamin C 33%, 9.0mg Calcium 1%, 429mg Potassium 9%,',
    'cuisine' => 'Commonly baked and served as a side dish.',
    'flavor' => 'Neutral, Earthy',
    'season' => 'Year-round',
    'harvesting' => 'Potatoes are typically harvested when mature.',
    'storage' => 'Store in a cool, dark place.',
    'history' => 'Cultivated for centuries and believed to have originated in the Andes region of South America.',
    'use' => 'Baked, mashed, fried, or used in various dishes.',
    'recipe' => '<br/>'
    ),
    array(
    'title' => 'Sweet Potato (baked)',
    'description' => 'Starchy root vegetable with a sweet flavor, often consumed baked or roasted.',
    'taxonomy' => '',
    'kingdom' => 'Plantae',
    'phylum' => 'Angiosperms',
    'class' => 'Eudicots',
    'order' => 'Solanales',
    'family' => 'Convolvulaceae',
    'genus' => 'Ipomoea',
    'species' => 'I. batatas',
    'variety' => 'Sweet Potato',
    'subspecies' => 'Not Applicable',
    'strain' => 'Not Applicable',
    'clade' => 'Not Applicable',
    'hybrid' => 'Cultivated hybrid',
    'form' => 'Not Applicable',
    'cultivar' => 'Sweet Potato',
    'habitat' => 'Cultivated Worldwide',
    'nutrition' => 'Approximately 54 mg per 100g of Oxalates, 20.1g Carbohydrate, 3.0g Dietary Fiber, 4.2g Sugar, 1.6g Protein, 2.1mg Vitamin C 4%, 30mg Calcium 2%, 337mg Potassium 7%,',
    'cuisine' => 'Commonly baked, roasted, or used in various dishes.',
    'flavor' => 'Sweet, Nutty',
    'season' => 'Year-round',
    'harvesting' => 'Sweet potatoes are typically harvested when mature.',
    'storage' => 'Store in a cool, dark place.',
    'history' => 'Cultivated for centuries and believed to have originated in Central or South America.',
    'use' => 'Baked, roasted, or used in various culinary applications.',
    'recipe' => '<br/>'
    ),
    array(
        'title' => 'Food Item',
        'description' => 'No Song Description',
        'taxonomy' => 'No Taxonomy',
        'kingdom' => 'No Kingdom',
        'phylum' => 'No Phylum',
        'class' => 'No Class',
        'order' => 'No Order',
        'family' => 'No Family',
        'genus' => 'No Genus',
        'species' => 'No Species',
        'variety' => 'No Variety',
        'subspecies' => 'No Subspecies',
        'strain' => 'No Strain',
        'clade' => 'No Clade',
        'hybrid' => 'No Hybrid',
        'form' => 'No Form',
        'cultivar' => 'No Cultivar',
        'habitat' => 'No Habitat',
        'nutrition' => 'No Nutrition',
        'cuisine' => 'No Cuisine',
        'flavor' => 'No Flavor',
        'season' => 'No Season',
        'harvesting' => 'No Harvests',
        'storage' => 'No Storings',
        'history' => 'No History',
        'use' => 'No Uses',
        'recipe' => 'No Recipes<br/>'
    )
);

// Prepare the insert statement
$insertStmt = $db->prepare("INSERT INTO food (title, description, taxonomy, kingdom, phylum, class, `order`, family, genus, species, variety, subspecies, strain, clade, hybrid, form, cultivar, habitat, nutrition, cuisine, flavor, season, harvesting, storage, history, `use`, recipe) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

if (!$insertStmt) {
    die("Error preparing insert statement: " . $db->error);
}

// Prepare the update statement
$updateStmt = $db->prepare("UPDATE food SET description = ?, taxonomy = ?, kingdom = ?, phylum = ?, class = ?, `order` = ?, family = ?, genus = ?, species = ?, variety = ?, subspecies = ?, strain = ?, clade = ?, hybrid = ?, form = ?, cultivar = ?, habitat = ?, nutrition = ?, cuisine = ?, flavor = ?, season = ?, harvesting = ?, storage = ?, history = ?, `use` = ?, recipe = ? WHERE id = ?");

if (!$updateStmt) {
    die("Error preparing update statement: " . $db->error);
}

// Retrieve the existing foods from the 'food' table
$sqlExistingSongs = "SELECT * FROM food";
$resultExistingSongs = $db->query($sqlExistingSongs);

if ($resultExistingSongs) {
    // Create an array to store the existing traits
    $existingFoods = array();

    // Fetch existing foods and store them in the array
    while ($row = $resultExistingSongs->fetch_assoc()) {
        $existingFoods[$row['title']] = $row;
    }

    // Loop through each music item in the script
    foreach ($foodItems as $foodItem) {
        $title = $foodItem['title'];

        // Check if the food item already exists in the database
        if (isset($existingFoods[$title])) {
            $existingFood = $existingFoods[$title];

            // Compare the values of the existing traits with the food item in the script
            $update = false; // Flag to determine if an update is needed

            if ($existingFood['description'] != $foodItem['description']) {
                $existingFood['description'] = $foodItem['description'];
                $update = true;
            }

            if ($existingFood['taxonomy'] != $foodItem['taxonomy']) {
                $existingFood['taxonomy'] = $foodItem['taxonomy'];
                $update = true;
            }

             if ($existingFood['kingdom'] != $foodItem['kingdom']) {
                $existingFood['kingdom'] = $foodItem['kingdom'];
                $update = true;
             }
             if ($existingFood['phylum'] != $foodItem['phylum']) {
                $existingFood['phylum'] = $foodItem['phylum'];
                $update = true;
             }
             if ($existingFood['class'] != $foodItem['class']) {
                $existingFood['class'] = $foodItem['class'];
                $update = true;
             }
             if ($existingFood['order'] != $foodItem['order']) {
                $existingFood['order'] = $foodItem['order'];
                $update = true;
             }
             if ($existingFood['family'] != $foodItem['family']) {
                $existingFood['family'] = $foodItem['family'];
                $update = true;
             }
             if ($existingFood['genus'] != $foodItem['genus']) {
                $existingFood['genus'] = $foodItem['genus'];
                $update = true;
             }
             if ($existingFood['species'] != $foodItem['species']) {
                $existingFood['species'] = $foodItem['species'];
                $update = true;
             }
             if ($existingFood['variety'] != $foodItem['variety']) {
                $existingFood['variety'] = $foodItem['variety'];
                $update = true;
             }
             if ($existingFood['subspecies'] != $foodItem['subspecies']) {
                $existingFood['subspecies'] = $foodItem['subspecies'];
                $update = true;
             }
             if ($existingFood['strain'] != $foodItem['strain']) {
                $existingFood['strain'] = $foodItem['strain'];
                $update = true;
             }
             if ($existingFood['clade'] != $foodItem['clade']) {
                $existingFood['clade'] = $foodItem['clade'];
                $update = true;
             }
             if ($existingFood['hybrid'] != $foodItem['hybrid']) {
                $existingFood['hybrid'] = $foodItem['hybdrid'];
                $update = true;
             }
             if ($existingFood['form'] != $foodItem['form']) {
                $existingFood['form'] = $foodItem['form'];
                $update = true;
             }
             if ($existingFood['cultivar'] != $foodItem['cultivar']) {
                $existingFood['cultivar'] = $foodItem['cultivar'];
                $update = true;
             }

            if ($existingFood['habitat'] != $foodItem['habitat']) {
                $existingFood['habitat'] = $foodItem['habitat'];
                $update = true;
            }

            if ($existingFood['nutrition'] != $foodItem['nutrition']) {
                $existingFood['nutrition'] = $foodItem['nutrition'];
                $update = true;
            }

            if ($existingFood['cuisine'] != $foodItem['cuisine']) {
                $existingFood['cuisine'] = $foodItem['cuisine'];
                $update = true;
            }

            if ($existingFood['flavor'] != $foodItem['flavor']) {
                $existingFood['flavor'] = $foodItem['flavor'];
                $update = true;
            }

            if ($existingFood['season'] != $foodItem['season']) {
                $existingFood['season'] = $foodItem['season'];
                $update = true;
            }
            
            if ($existingFood['harvesting'] != $foodItem['harvesting']) {
                $existingFood['harvesting'] = $foodItem['harvesting'];
                $update = true;
            }

            if ($existingFood['storage'] != $foodItem['storage']) {
                $existingFood['storage'] = $foodItem['storage'];
                $update = true;
            }

            if ($existingFood['history'] != $foodItem['history']) {
                $existingFood['history'] = $foodItem['history'];
                $update = true;
            }
            
            if ($existingFood['use'] != $foodItem['use']) {
                $existingFood['use'] = $foodItem['use'];
                $update = true;
            }

            if ($existingFood['recipe'] != $foodItem['recipe']) {
                $existingFood['recipe'] = $foodItem['recipe'];
                $update = true;
            }

            // Update the food if any changes are made
            if ($update) {
                $id = $existingFood['id'];
                $description = $foodItem['description'];
                $taxonomy = $foodItem['taxonomy'];
                 $kingdom = $foodItem['kingdom'];
                 $phylum = $foodItem['phylum'];
                 $class = $foodItem['class'];
                 $order = $foodItem['order'];
                 $family = $foodItem['family'];
                 $genus = $foodItem['genus'];
                 $species = $foodItem['species'];
                 $variety = $foodItem['variety'];
                 $subspecies = $foodItem['subspecies'];
                 $strain = $foodItem['strain'];
                 $clade = $foodItem['clade'];
                 $hybrid = $foodItem['hybdrid'];
                 $form = $foodItem['form'];
                 $cultivar = $foodItem['cultivar'];
                $habitat = $foodItem['habitat'];
                $nutrition = $foodItem['nutrition'];
                $cuisine = $foodItem['cuisine'];
                $flavor = $foodItem['flavor'];
                $season = $foodItem['season'];
                $harvesting = $foodItem['harvesting'];
                $storage = $foodItem['storage'];
                $history = $foodItem['history'];
                $use = $foodItem['use'];
                $recipe = $foodItem['recipe'];

                $updateStmt->bind_param("ssssssssssssssssssssssssssi", $description, $taxonomy, $kingdom, $phylum, $class, $order, $family, $genus, $species, $variety, $subspecies, $strain, $clade,  $hybrid, $form, $cultivar, $habitat, $nutrition, $cuisine, $flavor, $season, $harvesting, $storage, $history, $use, $recipe, $id);

                if ($updateStmt->execute()) {
                    echo "Food item updated successfully: " . $title . "<br>";
                } else {
                    echo "Error updating food item: " . $updateStmt->error;
                }
            }

            // Remove the food from the existing foods array to track any remaining foods to delete
            unset($existingFoods[$title]);
        } else {
            // Music item does not exist in the database, insert it
            $description = $foodItem['description'];
            $taxonomy = $foodItem['taxonomy'];
             $kingdom = $foodItem['kingdom'];
             $phylum = $foodItem['phylum'];
             $class = $foodItem['class'];
             $order = $foodItem['order'];
             $family = $foodItem['family'];
             $genus = $foodItem['genus'];
             $species = $foodItem['species'];
             $variety = $foodItem['variety'];
             $subspecies = $foodItem['subspecies'];
             $strain = $foodItem['strain'];
             $clade = $foodItem['clade'];
             $hybrid = $foodItem['hybrid'];
             $form = $foodItem['form'];
             $cultivar = $foodItem['cultivar'];
            $habitat = $foodItem['habitat'];
            $nutrition = $foodItem['nutrition'];
            $cuisine = $foodItem['cuisine'];
            $flavor = $foodItem['flavor'];
            $season = $foodItem['season'];
            $harvesting = $foodItem['harvesting'];
            $storage = $foodItem['storage'];
            $history = $foodItem['history'];
            $use = $foodItem['use'];
            $recipe = $foodItem['recipe'];

            $insertStmt->bind_param("sssssssssssssssssssssssssss", $title, $description, $taxonomy, $kingdom, $phylum, $class, $order, $family, $genus, $species, $variety, $subspecies, $strain, $clade,  $hybrid, $form, $cultivar, $habitat, $nutrition, $cuisine, $flavor, $season, $harvesting, $storage, $history, $use, $recipe);

            if ($insertStmt->execute()) {
                echo "Music item added successfully: " . $title . "<br>";
            } else {
                echo "Error inserting music item: " . $insertStmt->error;
            }
        }
    }

    // Delete any remaining foods from the database (not present in the script)
    foreach ($existingFoods as $food) {
        $id = $food['id'];

        $sqlDelete = "DELETE FROM food WHERE id = $id";

        if ($db->query($sqlDelete) !== TRUE) {
            echo "Error deleting food item: " . $db->error;
        } else {
            echo "Food item deleted from the database: " . $food['title'] . "<br>";
        }
    }
} else {
    echo "Error retrieving existing songs: " . $db->error;
}

// Close the prepared statements
$insertStmt->close();
$updateStmt->close();

// Close the database connection
$db->close();
?>