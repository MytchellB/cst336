<?php
    $backgroundImage = "img/sea.jpg";
    
    if (isset($_GET["keyword"])){ // checks if form has been submitted.
        include "api/pixabayAPI.php";
        // print_r($_GET); // Prints all values in GET.
        $keyword = $_GET["keyword"];
        echo "Keyword: $keyword";
        
        echo "Layout: ", $_GET["layout"];
        
        $imageURLs = getImageURLs($keyword, $_GET["layout"]);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
    
?>

<!DOCTYPE html>
<html>
    
    <head>
     <meta charset="utf-8">
     <title> Lab 4: Pixabay Slideshow </title>
     
     <style>
         body {
             background-image: url(<?=$backgroundImage?>);
             background-size: cover;
         }
     </style>
     
    </head>

    <body>
        <form method="GET">
            <input type="text" name="keyword" size="15" placeholder="Keyword"/>
            <input type="radio" name="layout" value="horizontal"> Horizontal
            <input type="radio" name="layout" value="vertical"> Vertical
            <input type="submit" value="Submit" name="submitButton"/>
        </form>
        
        <h1> Select a category or type a keyword </h1>
    
    </body>
</html>