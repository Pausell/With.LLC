<?php
$title = "Saved By The Blood Of The Crucified One";
$description = "Saved By The Blood Of The Crucified One";
$playlist = ["Gospel", "Hymn"];
$genre = ["Gospel", "Hymn"];
 $tune = [""];
$artist = [""];
$album = [""];
if (!isset($include)) {include('aa-beginning.php');}
$lyrics = <<<'TEXT'
[Verse 1]
Saved by the blood of the Crucified One!
Now ransomed from sin and a new work begun,
Sing praise to the Father and praise to the Son,
Saved by the blood of the Crucified One!

[Refrain]
Glory, I'm saved! glory, I'm saved!
My sins are all pardoned, my guilt is all gone!
Glory, I'm saved! Glory, I'm saved!
I'm saved by the blood of the Crucified One!

[Verse 2]
Saved by the blood of the Crucified One!
The angels rejoicing because it is done;
A child of the Father, joint-heir with the Son,
Saved by the blood of the Crucified One! (Refrain)

[Verse 3]
Saved by the blood of the Crucified One!
The Father He spake, and His will it was done;
Great price of my pardon, His own precious Son;
Saved by the blood of the Crucified One! (Refrain)

[Verse 4]
Saved by the blood of the Crucified One!
All hail to the Father, all hail to the Son,
All hail to the Spirit, the great Three in One!
Saved by the blood of the Crucified One! (Refrain)
TEXT;
if (!isset($include)) {echo ($lyrics);}
if (!isset($include)) {include ('aa-end.php');}
?>