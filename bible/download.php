<?php
$index = '../';
$path = '_global';

// Path to the CSS file
$cssFilePath = $index . $path . 'style.css';

// Read the contents of the CSS file
$cssContent = file_get_contents($cssFilePath);

// Get the URL of the current page
$currentURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// Use DOMDocument to parse the HTML of the current page
$doc = new DOMDocument();
@$doc->loadHTMLFile($currentURL);

// Find and update the existing <style> tag in the HTML
$styleTags = $doc->getElementsByTagName('style');

foreach ($styleTags as $styleTag) {
    // Append the contents of the external CSS file to the <style> tag
    $styleTag->nodeValue .= $cssContent;
}

// Save the updated HTML to a variable
$updatedHTML = $doc->saveHTML();

// Set the appropriate headers for a downloadable HTML file
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="downloaded_page.html"');

// Output the updated HTML as a downloadable file
echo $updatedHTML;
?>